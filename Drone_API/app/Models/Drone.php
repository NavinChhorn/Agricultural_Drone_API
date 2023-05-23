<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'bettery',
        'tank_capacity ',
        'location_id'
    ];
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function instructions(){
        return $this->hasMany(Instruction::class);
    }
    public function maps(){
        return $this->hasMany(Map::class);
    }
}
