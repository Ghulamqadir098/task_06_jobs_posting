<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function candidate_form(){

    return view('pages.auth.candidate_form');
    }

    public function candidate_sigup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'current_position' => 'required|string',
            'date_of_birth' => 'required|date',
        ]);
    

        if ($request->file('cv')) {
            $filePathcv = $request->file('cv')->store('cvs', 'public');
        }
        
        if ($request->file('cover_letter')) {
        
            $filePathcover = $request->file('cover_letter')->store('coverletters', 'public');
        
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>$request->password,
            'current_position' => $request->current_position,
            'date_of_birth' => $request->date_of_birth,
            'job_title'=>$request->job_title,
            'date_of_birth'=>$request->date_of_birth,
            'cv'=>$filePathcv,
            'cover_letter'=>$filePathcover
        ]);
        $role=Role::find(2);

        $user->roles()->attach($role->id);

         dd('USer Created');

    }

    public function login(Request $request){

    $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:8'
    ]);



    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

        $request->session()->regenerate();
        return redirect()->route('dashboard.home');
    }
    }

    public function logout(){

   Auth::logout();
    return redirect('/');
    }
    

}
