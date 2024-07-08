<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
// use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //show Register/Create Form
    public function register(){
        return view('users/register');
    }

    // Store New User
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // hash password
        $formFields['password'] = bcrypt($request->password);

        // Create User
        $user = User::create($formFields);

        // login
        auth()->login($user);

        return redirect('/')->with('message', 'User Created And Logged In');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have Been logged Out');
    }

    public function login(){
        return view('users/login');
    }

    // authenticationUsers

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required']);

            if(auth()->attempt($formFields)){
                $request->session()->regenerate();

                return redirect('/')->with('message', 'You have Been Logged In');
            }

            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
