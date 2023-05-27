<?php

namespace App\Http\Controllers;

use App\Models\Drone;
use App\Models\Instruction;
use App\Models\Plan;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all instruction 
        $instructions = Instruction::all();
        return response()->json(['messsage' => 'All Instructions', 'data' => $instructions], 200);
    }
   
   //  Request instructions to know which drone has this instruction
   public function getDroneInstruction(string  $id)
   {
       $instruct_id = Plan::where('drone_id' , $id)->first()->instruction_id;
       $insructions =  Instruction::find($instruct_id)->only(['command', 'action_desc']);
       return response()->json(['message' =>'get instruction asses by drone id successfully !','data'=>$insructions],200);
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
    public function show(Instruction $instruction)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instruction $instruction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instruction $instruction)
    {
        //
    }
}
