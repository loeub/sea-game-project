<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ticket = Ticket::all();
        return response() -> json(['Create success' => true, 'data' => $ticket],201);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'name' => $request -> input('name'),
            'user_id' => $request -> input('user_id'),
            'event_id' => $request -> input('event_id'),
            'timeStart' => $request -> input('timeStart'),
            'timeEnd' => $request -> input('timeEnd'),
            'location' => $request -> input('location'),
        ]);
        return response() -> json(['Create success' => true, 'data' => $ticket],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ticket = Ticket::find($id);
        $ticket = new TicketResource($ticket);
        return response() -> json(['success' => true, 'data' => $ticket],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $ticket = Ticket::find($id);

        $ticket->update([
            'name' => $request -> input('name'),
            'user_id' => $request -> input('user_id'),
            'event_id' => $request -> input('event_id'),
            'timeStart' => $request -> input('timeStart'),
            'timeEnd' => $request -> input('timeEnd'),
            'location' => $request -> input('location'),
        ]);

        return response() -> json(['update success' => true, 'data' => $ticket],201);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $ticket = Ticket::find($id);
        $ticket->delete();
        
        return response() -> json(['success' => true, 'data' => $ticket],201);
        
    }
}
