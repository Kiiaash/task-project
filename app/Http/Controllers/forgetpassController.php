<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class forgetpassController extends Controller
{
    public function showTheForm(){
        return view('managment_forget_pass.index');
    }

    public function reset(Request $request){
        $request->validate([
            'email'=>'required',
        ]);
        
        $user = User::where('email',$request->only('email'))->where('level',"admin")->first();
        if($user==""){
            return redirect()->route('forget.pass')->with('status','The credentials provided is not valid, please try again');
        }else{
            $status = Password::sendResetLink($request->only('email'));
            if($status === Password::RESET_LINK_SENT){
                return redirect()->route('forget.pass')->with(['success'=>__($status)]);
            }
        }
    }

    public function showresetpassform(){
        return view('managment_password_reset.index');
    }

    public function changepass(Request $request,$token){
        
    }
}
