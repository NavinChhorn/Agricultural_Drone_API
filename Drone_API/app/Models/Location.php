<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude ',
        'longitude',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function drones():HasMany{
        return $this->hasMany(Drone::class);
    }
   
}
