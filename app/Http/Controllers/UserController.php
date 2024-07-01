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

        return redirect('/')->with('message', 'User Created And Login');
    }
}
