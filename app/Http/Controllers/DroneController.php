<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDronesRequest;
use App\Models\Drone;
use App\Models\DroneLocation;
use App\Models\MapPicture;
use App\Models\Province;
use Illuminate\Support\Str;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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


    // Instruct drone id to enter run mode with a given plan
    public function instructDroneById(string $id)
    {
        $drone = Drone::find($id)->first();
        if ($drone->status == "idle") {
            $drone->status = 'Running';
        }
        $drone->save();
        return response()->json(['message' => 'Drone running on id : ' . $id, 'data' => $drone], 200);
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
        return $properties;
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

    public function sendImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $imgFile = $request->file('image');
            $imgFile->store('public/images/');
            response('Added successfully!');
        }
    }

    public function downloadImg($location, $id)
    {
        dd(Auth::user());
        if (Auth::user()->role === 'drone') {
            $locationID = Province::where('name', $location)->id;
            $filePath = MapPicture::find($id)->where('drone_id', Auth::user()->id)->scanned_map;
            // return Storage::download($filePath);
            dd($filePath);
        }
    }
}
