<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $instructions =[
            ['command'=> 'Pick orange' , 'action_desc'=>'add battary capacity and go to orange farm'], 
            ['command'=> 'Pick apple' , 'action_desc'=>'remote control to fly the drone to the apple farm and cut it down'], 
        ];
        foreach($instructions as $instruction){
            Instruction::create($instruction);
        }

    }
}
