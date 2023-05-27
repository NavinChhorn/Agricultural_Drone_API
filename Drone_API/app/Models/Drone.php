<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'bettery',
        'plan_id',
        'instruction_id',
        'location_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
    public function location():BelongsTo{
        return $this->belongsTo(Location::class);
    }
    public function instruction():BelongsTo{
        return $this->belongsTo(Instruction::class);
    }
    public function plan():BelongsTo{
        return $this->belongsTo(Plan::class);
    }
    public function maps():HasMany{
        return $this->hasMany(Map::class);
    }
   
}
