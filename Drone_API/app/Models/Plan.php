<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
                                            BelongsTo,
                                            HasMany
                                            };

class Plan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'datetime',
        'area',
        'density',
        'type',
        'farm_id',
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
    public function farm():BelongsTo{
        return $this->belongsTo(farm::class);
    }
}
