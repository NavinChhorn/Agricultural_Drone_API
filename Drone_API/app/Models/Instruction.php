<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'speed',
        'altitude',
        'start_plan'
    ];
    public function drone():HasOne{
        return $this->hasOne(Drone::class);
    }
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
