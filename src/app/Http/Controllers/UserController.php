<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {

        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'username' =>  ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
       // auth()->login($user);

        return redirect('/home')->with('message', 'New User created');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message', 'You have been logged out!');
    }

    // Show Login Form
    public function login() {
        if (Auth::check()) {
        return redirect('/home');
        }
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
           $formFields = $request->validate([
            'username' => ['required'],
            'password' => 'required'
        ]);
        $identity = $request->get("username");
        $password = $request->get("password");
    // check input type username or email than login
        if(auth()->attempt( [filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username' => $identity,'password' => $password])) {
            $request->session()->regenerate();
            return redirect('/home')->with('message', 'You are now logged in!');
        }
        return back()->withErrors(['username' => 'Invalid Credentials!'])->onlyInput('username');
    }
}
