<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'province_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function province():BelongsTo{
        return $this->belongsTo(Province::class);
    }
    public function maps():HasMany{
        return $this->hasMany(Map::class);
    }
    public function plans():HasMany{
        return $this->hasMany(Plan::class);
    }
}
