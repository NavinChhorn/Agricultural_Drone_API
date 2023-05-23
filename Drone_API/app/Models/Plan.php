<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'datetime ',
        'area',
        'density',
        'type',
        'farmer_id'
    ];
    public function farmer(){
        return $this->belongsTo(Farmer::class);
    }
    public function instructions(){
        return $this->hasMany(Instruction::class);
    }

}
