<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDronesRequest;
use App\Models\Drone;
use App\Models\DroneLocation;
use App\Models\Farm;
use App\Models\MapPicture;
use App\Models\Province;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
        return $this->success($drones, 'All drones');
    }

    /**
     * Returning current drone location via drone ID
     * @param id 
     * */
    public function getDroneLocation(string $id)
    {
        $droneLocation =  DroneLocation::where('drone_id', $id)->first();
        return $this->success($droneLocation, 'get drone location successfully!');
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
        return $this->success($drones, 'Show drone on id :' . $id, 200);
    }


    // Instruct drone id to enter run mode with a given plan
    public function instructDroneById(string $id)
    {
        $drone = Drone::find($id)->first();
        if ($drone->status == "idle") {
            $drone->status = 'Running';
        }
        $drone->save();
        return $this->success($drone, 'Drone running on id :' . $id, 200);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        //validation
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:30',
                'model' => 'required',
                'serial_number' => 'required',
                'battery_capacity' => 'required',
                'payload_size' => 'required',
            ]
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        $drones = Drone::where('id', $id)->update([
            'name' => $request->name,
            'model' => $request->model,
            'serial_number' => $request->serial_number,
            'battery_capacity' => $request->battery_capacity,
            'payload_size' => $request->payload_size,
            'status' => $request->status,
        ]);
        return $this->success($drones, 'Successfully updated!!', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // if (Drone::find($id) !== null) {
        //     Drone::find($id)->delete();
        // }
    }

    public function sendImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $imgFile = $request->file('image');
            $inputData = $request->input();
            $imgFile->store('public/images/');
            MapPicture::create(
                [
                    'scanned_map' => $imgFile->hashName(),
                    'drone_id' => (int)$inputData['drone_id'],
                    'farm_id' => (int)$inputData['farm_id'],
                ]
            );
            return response($imgFile->getClientOriginalName());
        }
    }

    public function downloadImg($location, $id)
    {
        $locationID = Province::where('name', $location)
            ->get('id')
            ->first()
            ->id;
        $farmID = Farm::where('province_id', $locationID)
            ->get('id')
            ->first()->id;
        $picName  = MapPicture::where(
            'farm_id',
            $farmID
        )->get('scanned_map')
            ->last()
            ->scanned_map;

        $path = storage_path("app\public\images\\") . $picName;

        if (File::exists($path)) {

            return response()->download($path);
        }

        return $this->error(null, 'Map is unavailable!', 404);;
    }
}
