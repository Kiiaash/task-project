<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageLogin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ManagmentController extends Controller
{
    public function login(ManageLogin $request){

        // dd($request->input());
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'level'=>"admin"],$request->remMe)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login.take')->with('faild','There were not matches for your credntial, please try again');
        }
    }

    public function takelogin(){
        return view('managment_login.index');
    }

    public function logout(Request $request){
        Auth::logout();
         $request->session()->invalidate(); 
         $request->session()->regenerateToken(); 
         return redirect()->route('main');
    }
}
