<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;
use Exception;

class ApiController extends Controller{
    public function index(){
        $data = Courses::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function show($listing){
        $data = Courses::where('id', '=', $listing)->get();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }


    public function store(Request $request){
        try{
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

            $course = Courses::create($formFields);

            $data = Courses::where('id','=', $course->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            else{
                return ApiFormatter::createApi(400, 'Failed');
        }
        }
        catch(Exception $error){
            return ApiFormatter::createApi(400, $error);
        }

    }

    public function update(Request $request, $listing){
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

            $data = Courses::where('id','=', $course->id)->get();

            if($listing){
                return ApiFormatter::createApi(200, 'Success', $data);
            }
            else{
                return ApiFormatter::createApi(400, 'Failed');
            }
    }

    public function destroy($listing){

        $check = Courses::where('id','=', $listing)->get();

        $data = $check->delete();

        if($data){
            return ApiFormatter::createApi(200, 'Success');
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function stats(){
        $totalUsers = DB::table('users')->count();
        $totalCourses = Courses::count();
        $totalFreeCourses = Courses::where('price',0)->count();

        $data = [
            'Total Users' => $totalUsers,
            'Total Courses' => $totalCourses,
            'Total FreeCourses' => $totalFreeCourses
        ];

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data );
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function deleteUser($user){
        $check = User::where('id','=', $user);

        $data = $check->delete();

        if($data){
            return ApiFormatter::createApi(200, 'User Deleted');
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function getCourseByCategory($category){
        $data = Courses::where('tags','like','%' . $category . '%')->get();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data );
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function apiSearch(Request $request){
        $query = Courses::query();

        if ($search = $request->input('search')) {
            $query->whereRaw("name LIKE '%" . $search . "%'")
                ->orWhereRaw("description LIKE '%" . $search . "%'")
                ->orWhereRaw("tags LIKE '%" . $search . "%'");
        }

        $perPage = 9;
        $page = $request->input('page', 1);
        $total = $query->count();

        $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();

        return ApiFormatter::createApi(200, 'Success', $result);
    }

    public function getAllCategories(){
        $check = Courses::select('tags')->get();
        $predata = [];
        $toArray = json_decode($check, true);


        foreach($toArray as $tags){
            // $temp = json_decode($tags,true);
            foreach($tags as $tag){
                $new = explode(', ', $tag);
                foreach($new as $category){
                    array_push($predata,$category);
                }
            }
        }

        $data = array_values(array_unique($predata, SORT_REGULAR));

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data );
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function getPopularCategories(){
        $check = Courses::select('tags')->get();
        $predata = [];
        $toArray = json_decode($check, true);


        foreach($toArray as $tags){
            // $temp = json_decode($tags,true);
            foreach($tags as $tag){
                $new = explode(', ', $tag);
                foreach($new as $category){
                    array_push($predata,$category);
                }
            }
        }

        $array_frequency = array_count_values($predata);
        $sort = arsort($array_frequency);
        $newarray = $array_frequency;
        $realPreData = array_keys($newarray);

        $data = array_slice($realPreData,0,5);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data );
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function priceFree(){
        $data = Courses::whereRaw("price = 0")->get();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data );
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function lowestPrice(){
        $data = Courses::orderBy('price',"ASC")->get();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data );
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
        }


    public function highestprice(){
        $data = Courses::orderBy('price',"DESC")->get();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data );
        }
        else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
