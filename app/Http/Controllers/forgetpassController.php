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
        $user = User::where('email',$request->only('email'))->where('level',"admin")->first();
        $status = Password::sendResetLink($request->only('email'));
        if($status === Password::RESET_LINK_SENT && $user->level == "admin"){
            return back()->with(['status'=>__($status)]);
        }else{
            return back()->withErrors(['email'=>__($status)]);
        }
    }
}
