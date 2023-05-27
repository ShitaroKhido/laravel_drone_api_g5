<?php

namespace Database\Seeders;

use App\Models\DroneLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DroneLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $locations =[
            ['latitude'=> '11.993780' , 'longitude'=>'11.993780','drone_id'=>1], //kampongcham
            ['latitude'=> '11.149370' , 'longitude'=>'105.444620','drone_id'=>2],//svayrang
            ['latitude'=> '11.149370' , 'longitude'=>'105.444620','drone_id'=>3],//svayrang
        ];
        foreach($locations as $location){
            DroneLocation::create($location);
        }
    }
}
