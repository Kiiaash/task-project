<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminModifierRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminModifierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $path = $request->path();
        return view('admin.admin_registration.index',compact('path'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminModifierRequest $request)
    {
        
        $users = new User();
        $users -> name = $request->input('username');
        $users -> email = $request->input('email');
        $users -> password = Hash::make($request->input('password'));
        $users -> created_at = now();
        $users -> updated_at = null;
        $users ->state = "active";
        $users ->level = $request->input('role');
        $users -> save();

        return redirect()->route('adminmod.create')->with('success','you have successfully created the new admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
