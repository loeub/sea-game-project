<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequests;
use App\Http\Resources\EventShowResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        //
        $event = Event::all();
        return response() -> json(['success' => true, 'data' => $event],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequests $request)
    {
        //
        $event = Event::store($request);
        return response()->json(['success'=>true,'data'=>$event],200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $event = Event::find($id);
        $event = new EventShowResource($event);
        return response()->json(['success'=>true,'data'=>$event],200);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequests $request, string $id)
    {
        //
        $event =Event::store($request,$id);
        return response()->json(['success'=>true,'data'=>$event],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        
        $event = Event::find($id);
        $event->delete();
        return response()->json(['success'=>true,'data'=>"delete successfully"],200);
    }

    public function search($event_name){
        
        $event = Event::where('name','like','%'.$event_name.'%')->get();
        return $event;
    }
}
