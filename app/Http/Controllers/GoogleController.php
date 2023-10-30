<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function provider(){
        // dd('1');
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        // dd('2');
        $user = Socialite::driver('google')->user();
        // dd($user);
        $data = User::where('email',$user->email)->first();
        if(is_null($data)){
            // dd('if');
            $users['name'] = $user->name;
            $users['email'] = $user->email;
            $data = User::create($users);
        }
        Auth::login($data);
        return redirect('/');
    }
}
