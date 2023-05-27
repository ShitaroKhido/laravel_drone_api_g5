<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'name',
        'province_id',
    ];
    // farm belong to one province 
    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    // farm has many plans 
    public function plans()
    {
        return $this->hasMany(Plan::class, 'farm_id');
    }

    public function mapPictures()
    {
        return $this->hasMany(MapPicture::class, 'farm_id');
    }
}
