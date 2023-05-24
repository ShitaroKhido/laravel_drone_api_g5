<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroneLocation extends Model
{
    use HasFactory;
    protected $fillable =[
        'latitude',
        'logitude',
        'drone_id',
    ];
    // drone location belong to one drone
    public function drones()
    {
        return $this->belongsTo(Drone::class, 'drone_id');
    }
 }

