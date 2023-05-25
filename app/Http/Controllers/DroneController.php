<?php

namespace App\Http\Controllers;

use App\Models\Drone;
use App\Models\DroneLocation;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get list of drone 
        $drones = Drone::all();
        return response()->json(['message' =>  'All drones', 'data' => $drones], 200);
    }

    public function getDroneLocation(string $id)
    {
        // return "hi";
        return DroneLocation::where('drone_id', $id)->first();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //​​ Output information about drone id 
        $drones = Drone::find($id);
        return response()->json(['message' => 'Show drone on id : ' . $id, 'data' => $drones], 200);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drone $drone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drone $drone)
    {
        //
    }
}
