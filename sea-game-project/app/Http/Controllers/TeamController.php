<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teams = Team::all();
        return response() -> json(['success' => true, 'data' => $teams],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teams = Team::create([
            'name'=> $request->input('name'),
            'user_id'=> $request->input('user_id'),
            'member'=> $request->input('member'),
        ]);
        return response() -> json(['Create success' => true, 'data' => $teams],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $id)
    {
        //
        $teams = Team::find($id);
        return response() -> json(['Create success' => true, 'data' => $teams],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $teams = Team::find($id);

        $teams->update([
            'name'=> $request->input('name'),
            'create_by_id'=> $request->input('create_by_id'),
            'member'=> $request->input('member'),
        ]);

        return response() -> json(['success' => true, 'data' => $teams],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $teams = Team::find($id);
        $teams->delete();

        return response() -> json(['success' => true, 'data' => $teams],200);
    }
}
