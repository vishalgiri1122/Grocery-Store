<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully!');
    }
    public function saveUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'min:6|required_with:confirm_password|same:password',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        // Log in the user immediately after registration
        Auth::login($user);
        return redirect('/')->with('success', 'Registration successful!, Ready to shop.');
    }
    public function userLogin(Request $request){
        // dd($request->all());
        $previousURL = $request->input('previousURL');
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            $user = Auth::user();
            // dd($user);
            if($user){
                return redirect($previousURL)->with('success', 'Logged in successfully!');
            }
        }
        else{
           return back()->withInput()->withErrors(['error' => 'Invalid credentials']);
        }
    }
}
