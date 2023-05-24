<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'speed',
        'altitude',
        'plan_id',
        'drone_id'
    ];
    public function plane(){
        return $this->belongsTo(Plan::class);
    }
    public function drone(){
        return $this->belongsTo(Drone::class);
    }
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
