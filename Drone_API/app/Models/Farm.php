<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'province_id'
    ];
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function farmers(){
        return $this->hasMany(Farmer::class);
    }
    public function maps(){
        return $this->hasMany(Map::class);
    }
}
