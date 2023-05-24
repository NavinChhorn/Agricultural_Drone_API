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
        'location_id'
    ];
    public function location():BelongsTo{
        return $this->belongsTo(Location::class);
    }
    public function instructions():HasMany{
        return $this->hasMany(Instruction::class);
    }
    public function maps():HasMany{
        return $this->hasMany(Map::class);
    }
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
