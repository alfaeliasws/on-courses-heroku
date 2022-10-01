<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use Cloudinary\Api\Upload\UploadApi;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CoursesController extends Controller
{
    public function __construct() {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Courses::latest()->filter(request(['tag', 'search']))->paginate(10);

        return view('index',[
        'listings' => $data
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCoursesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'picture'=>'required|mimes:jpeg,jpg,png,svg',
            'price'=>'required',
            'tags'=>'required',
        ]);

        if($request->hasFile('picture')){
            $image_name = $request->file('picture')->getClientOriginalName();

            $upload = Cloudinary::upload($request->file('picture')->getRealPath())->getSecurePath();

            $formFields['picture'] = $upload;
        // $request->file('picture')->store('images','public');
        // $formFields['picture'] = "images/" . $request->picture->hashName();
        }

        Courses::create($formFields);

        return redirect('/')->with('message','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $listing)
    {
        return view('show',[
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $listing)
    {
        return view('edit',['listing'=> $listing]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoursesRequest  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $listing)
    {
        $formFields = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'picture'=>'required|mimes:jpeg,jpg,png,svg',
            'price'=>'required',
            'tags'=>'required',
        ]);

        if($request->hasFile('picture')){
            // $request->file('picture')->store('images','public');
            // $formFields['picture'] = "images/" . $request->picture->hashName();
        }

        $course = Courses::findOrFail($listing);

        $updated = $course->update($formFields);

        $listing = Courses::where('id','=', $course->id)->get();

        return view('showafteredit',['listings' => $listing])->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $listing)
    {
        $listing->delete();
        return redirect('/')->with('message','Listing deleted successfully');
    }

    public function manage() {
        return view('manage', ['listings' => Courses::all()]);
    }

    public function manageUsers(){
        return view('manage_with_users',['listings' => Courses::all(), 'users' => User::all()->where('deleted_at', NULL) ]);
    }

    public function manageStats(){
        $totalUsers = DB::table('users')->count();
        $totalCourses = DB::table('courses')->count();
        $totalFreeCourses = DB::table('courses')->where('price',0)->count();
        return view('manage_with_stats',['listings' => Courses::all(),
                                        'totalUsers' => $totalUsers, 'totalCourses' => $totalCourses,
                                        'totalFreeCourses' => $totalFreeCourses]);
    }

    public function manageStatsAndUsers(){
        $totalUsers = DB::table('users')->count();
        $totalCourses = DB::table('courses')->count();
        $totalFreeCourses = DB::table('courses')->where('price',0)->count();
        return view('manage_with_statsandusers',['listings' => Courses::all(), 'users' => User::all(),
                                        'totalUsers' => $totalUsers, 'totalCourses' => $totalCourses,
                                        'totalFreeCourses' => $totalFreeCourses]);
    }
}
