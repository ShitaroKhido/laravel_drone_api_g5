<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //list all plan
        $plans = Plan::all();
        return response()->json(['message' => 'This is list plan' , 'data' => $plans],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validation
         $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:30',
                'assigned_datetime' => 'required',
                'drone_id' => 'required',
                'instruction_id' => 'required',
                'farm_id' => 'required',
                'user_id' => 'required',
            ]
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        //add plan 
        $plans = Plan::create([
            'name'=>$request['name'],
            'assigned_datetime'=>$request['assigned_datetime'],
            'drone_id'=>$request['drone_id'],
            'instruction_id'=>$request['instruction_id'],
            'farm_id'=>$request['farm_id'],
            'user_id'=>$request['user_id'],
        ]);
        return response()->json(['message' => 'create plan successfully !' , 'data' => $plans],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //show plan by id 
        $plans = Plan::find($id);
        return response()->json(['message' => 'Show drone on id : ' . $id, 'data' => $plans], 200);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
    //update plan by id
         //validation
         $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:30',
                'assigned_datetime' => 'required',
                'drone_id' => 'required',
                'instruction_id' => 'required',
                'farm_id' => 'required',
                'user_id' => 'required',
            ]
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        $plans = Plan::where('id',$id)->update([
            'name'=>$request['name'],
            'assigned_datetime'=>$request['assigned_datetime'],
            'drone_id'=>$request['drone_id'],
            'instruction_id'=>$request['instruction_id'],
            'farm_id'=>$request['farm_id'],
            'user_id'=>$request['user_id'],
        ]);
        return response()->json(['message' => 'update plan successfully !' , 'data' => $plans],200);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete plan by id
        $plans = Plan::destroy($id);
        return response()->json(['message' => 'Delete successfully', 'data' =>$plans],200);
    }
}
