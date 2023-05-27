<?php

namespace Database\Seeders;

use App\Models\Drone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DroneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $drones =[
            ['name'=> 'DJI Mavic Air 2' , 'model'=>'MA2','serial_number'=>'xxxx-xxxx' , 'battery_capacity'=>3500,'payload_size'=>249,'user_id'=>1],
            ['name'=> 'DJI Phantom 4 Pro' , 'model'=>'P4P','serial_number'=>'xxxx-xxxx' , 'battery_capacity'=>5870,'payload_size'=>2.7,'user_id'=>2],
            ['name'=> 'Autel Robotics EVO' , 'model'=>'	EVO','serial_number'=>'xxxx-xxxx' , 'battery_capacity'=>5400,'payload_size'=>2.5,'user_id'=>1],
        ];
        foreach($drones as $drone){
            Drone::create($drone);
        }
    }
}
