<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use Cloudinary\Uploader;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CoursesController extends Controller
{
    public function __construct() {
		/**
		 * Set your APIKey Cloudinary
		 * cloudname
		 * api_key
		 * api_secret
		 */
		// Cloudinary::config(array(
		// 	"cloud_name" => env('CLOUDINARY_CLOUD_NAME'),
		// 	"api_key" => env('CLOUDINARY_API_KEY'),
		// 	"api_secret" => env('CLOUDINARY_API_SECRET'),
		// ));
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
            // $formFields['picture'] = cloudinary()->upload($request->file('picture')->getRealPath())->getSecurePath();
            // $judul_file = $request->get('picture');
            // $gambar = $request->file('picture');
            // $nama_file = Str::slug($judul_file);
            // $upload = Uploader::upload($gambar, array("public_id" => $nama_file));
        $request->file('picture')->store('images','public');
        $formFields['picture'] = "images/" . $request->picture->hashName();
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
            $formFields['picture'] = $request->file('picture')->store('images','public');
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
