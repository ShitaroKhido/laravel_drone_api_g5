<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;    use HasFactory;
    protected $fillable =[
        'name',
        'assigned_datetime',
        'drone_id',
        'instruction_id',
        'farm_id',
        'user_id',
    ];
    // plan belong to one user 
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // plan has many drone
    public function drones() :HasOne
    {
        return $this->hasOne(Drone::class , 'plan_id');
    }
    // plan belong to one instruction
    public function instructions()
    {
        return $this->belongsTo(Instruction::class, 'instruction_id');
    }
    // plan belong to one farm
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id'); 
    }
}
