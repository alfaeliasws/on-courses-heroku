<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public $successStatus = 200;

    //Register FOrm
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required','min:3'],
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6',
            'api_token'=> Str::random(60),
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);


        return redirect('/')->with('message',"You've Signed Up");
    }

    public function storeAdmin(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required','min:3'],
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $data = [...$formFields,'is_admin'=> 1,'api_token'=> Str::random(60),];

        $user = User::create($data);

        // auth()->login($user);


        return $data;
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message',"You've been logged out");
    }

    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in!');
        }

        return back()->withError(['username' => 'Invalid Credentials'])->onlyInput('username');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/')->with('message','User deleted successfully');
    }
}
