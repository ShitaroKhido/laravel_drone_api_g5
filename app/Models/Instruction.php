<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    protected $fillabled =[
        'command',
        'action_desc',
    ];

    // instuction has only one plan
    public function plans()
    {
        return $this->hasOne(Plan::class);
    }
}
