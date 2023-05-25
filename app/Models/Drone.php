<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'model',
        'serial_number',
        'battery_bapacity',
        'payload_size',
        'status',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // drone belong to one plan 
    public function plans()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
    // drone has many map_pictures
   public function map_pictures()
    {
        return $this->hasMany(Map_picture::class, 'drone_id');
    } 
    // drone has many drone_location
   public function drone_locations()
    {
        return $this->hasMany(DroneLocation::class, 'drone_id');
    } 
}   
