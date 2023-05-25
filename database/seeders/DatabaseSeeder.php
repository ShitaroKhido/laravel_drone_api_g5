<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Drone;
use App\Models\DroneLocation;
use App\Models\Farm;
use App\Models\Instruction;
use App\Models\MapPicture;
use App\Models\Plan;
use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // create user data 
        User::factory(2)->create();
        // create drone data
        Drone::factory(5)->create();
        // create done location data
        DroneLocation::factory(5)->create();
        //create province data
        Province::factory(5)->create();
        // create instruction data 
        Instruction::factory(5)->create();
        // create farm data
        Farm::factory(5)->create();
        // create plan data 
        Plan::factory(5)->create();
        // create map picture data
        MapPicture::factory(5)->create();



    }
}
