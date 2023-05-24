<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map_picture extends Model
{
    use HasFactory;
    protected $fillable = [
        'scanned_map',
        'drone_id',
    ];
    // map_picture belong to one drone 
    public function drones()
    {
        return $this->belongsTo(Drone::class, 'drone_id');
    }
}
