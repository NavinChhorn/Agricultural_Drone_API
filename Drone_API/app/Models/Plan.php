<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'datetime',
        'area',
        'density',
        'type',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function instructions(){
        return $this->hasMany(Instruction::class);
    }
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
