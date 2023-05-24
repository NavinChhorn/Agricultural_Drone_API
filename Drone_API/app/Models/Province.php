<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function farms(){
        return $this->hasMany(Farm::class);
    }
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
