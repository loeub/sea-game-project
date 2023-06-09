<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response() -> json(['success' => true, 'data' => $user],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> $request->input('password'),
        ]);

        return response() -> json(['Create success' => true, 'data' => $user],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response() -> json(['success' => true, 'data' => $user],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::find($id);

        $user->update([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> $request->input('password'),
        ]);

        return response() -> json(['success' => true, 'data' => $user],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $users = User::find($id);
        $users->delete();

        return response() -> json(['success' => true, 'data' => $users],200);
    }
}
