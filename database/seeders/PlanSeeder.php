<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans =[
            ['name'=> 'Order 11' , 'assigned_datetime'=>'2023-05-27 2:00', 'drone_id'=>1,'instruction_id'=>1,'farm_id'=>1,'user_id'=>1], 
            ['name'=> 'Order 22' , 'assigned_datetime'=>'2023-05-28 15:00', 'drone_id'=>2,'instruction_id'=>2,'farm_id'=>2,'user_id'=>2], 
        ];
        foreach($plans as $plan){
            Plan::create($plan);
        }
    }
}
