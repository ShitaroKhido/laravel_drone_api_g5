<?php

namespace Database\Seeders;

use App\Models\MapPicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maps =[
            ['scanned_map'=> 'https://picsum.photos/200/300' , 'drone_id'=>1,'farm_id'=>1], //kampongcham
            ['scanned_map'=> 'https://picsum.photos/200/300' , 'drone_id'=>2,'farm_id'=>2], //kampongcham
            ['scanned_map'=> 'https://picsum.photos/200/300' , 'drone_id'=>3,'farm_id'=>3], //kampongcham
        ];
        foreach($maps as $map){
            MapPicture::create($map);
        }

    }
}
