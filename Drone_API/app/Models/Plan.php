<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'datetime',
        'area',
        'density',
        'type',
        'user_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function drones():HasMany{
        return $this->hasMany(Drone::class);
    }
   

}
