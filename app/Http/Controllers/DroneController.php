<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDronesRequest;
use App\Models\Drone;
use App\Models\DroneLocation;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DroneController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get list of drone 
        $drones = Drone::all();
        return response()->json(['message' =>  'All drones', 'data' => $drones], 200);
    }

    /**
     * Returning current drone location via drone ID
     * @param id 
     * */
    public function getDroneLocation(string $id)
    {
        return DroneLocation::where('drone_id', $id)->first();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDronesRequest $request)
    {
        $request->validated($request->input());

        $drone = Drone::create(
            [
                'name' => $request->name,
                'model' => $request->model,
                'serial_number' => $request->serial_number,
                'battery_capacity' => (int)$request->battery_capacity,
                'payload_size' => (int)$request->payload_size,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]
        );

        return $this->success($drone, 'Drone Added!');
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
    public function update(Request $request, $id)
    {
        $properties =  [
            'name' => $request->name,
            'model' => $request->model,
            'serial_number' => $request->serial_number,
            'battery_capacity' => (int)$request->battery_capacity,
            'payload_size' => (int)$request->payload_size,
            'status' => $request->status,
        ];

        Drone::find($id)->where('user_id', Auth::user()->id)->update($properties);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Drone::find($id) !== null) {
            Drone::find($id)->delete();
        }
    }
}
