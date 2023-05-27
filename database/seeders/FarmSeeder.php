<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $farms =[
            ['area'=> 'Polygon(11.993780,11.993780)' , 'name'=>'Apple Farm' , 'province_id'=>1],
            ['area'=> 'Polygon(11.149370,105.444620)' , 'name'=>'Orange Farm' , 'province_id'=>2],
            ['area'=> 'Polygon(11.149370,105.444620)' , 'name'=>'Vegetable Farm' , 'province_id'=>3],
        ];
        foreach($farms as $farm){
            Farm::create($farm);
        }
    }
}
