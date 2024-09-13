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

        return redirect('/');


    }

    public function employer_form(){

    return view('pages.auth.employer_form');
    }
    public function employer_signup(Request $request){

   $request->validate([
        'name' =>'required|string',
        'email' =>'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        'company_name' =>'required|string',
        'company_logo'=>'required|file',
        'company_location'=>'required|unique:users',
        'head_count'=>'required',
    ]);
    if($request->file('company_logo')){

        $filePathlogo = $request->file('company_logo')->store('company_logo', 'public');
    }

    $user= User::create(
   [
        'name' => $request->name,
        'email' => $request->email,
        'password'=>$request->password,
        'company_name' => $request->company_name,
        'company_logo'=>$filePathlogo,
        'company_location'=>$request->company_location,
        'head_count'=>$request->head_count

   ]);
    $role=Role::find(3);
    $user->roles()->attach($role->id);
    


    return redirect('/');

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
    else{
        session()->flash('message', 'Wrong details!');
        return redirect()->back();
    }
    }

    public function logout(){

   Auth::logout();
    return redirect('/');
    }
    

}
