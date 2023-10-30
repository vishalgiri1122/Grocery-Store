<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function showRegisterPage(){
        $title = "Register";
        return view('admin.register',get_defined_vars());
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('/login')->with('success', 'User has been added successfully!');
    }
    public function showLoginPage(){
        $title = "Login";
        return view('admin.login',get_defined_vars());
    }
    public function login(Request $request){
        // dd($request->all());
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            $user = Auth::user();
            // dd($user);
            // if(Auth::user()->is_admin == 1){
                return redirect('dashboard');
            // }
        }
        else{
            return back()->with('error', 'Invalid credentials');
        }
    }
    // public function dashboard(){
    //     $title = "Dashboard";
    //     return view('admin.index',get_defined_vars());
    // }
    // public function userDashboard(){
        //     return view('admin.userDashboard');
        // }
        public function logout(Request $request){
            $request->session()->flush();
            Auth::logout();
            return redirect('/login');
        }

        public function show_admin_pic(){
            $title = "Admin picture";
            return view('admin.admin_img.index',get_defined_vars());
        }
        public function update_admin_pic(Request $request){
            $title = "Admin picture";
            $admin = User::where('is_admin',1)->first();
            $imageName = random_int(100000, 999999) . '.' . $request->img->extension();
            $path =  $request->img->move(public_path('assets/admin/dp/'), $imageName);
            $admin->img = $imageName;
            $admin->save();
            // dd($admin);
            return redirect()->back();
        }
}
