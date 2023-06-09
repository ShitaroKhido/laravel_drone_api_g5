<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces =[
            ['name'=> 'Kampongcham'],
            ['name'=> 'SvayRang'],
            ['name'=> 'SiemReap'],
        ];
        foreach($provinces as $province){
            Province::create($province);
        }
    }
}
