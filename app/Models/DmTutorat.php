<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmTutorat extends Model
{
    use HasFactory;
    protected $fillable = [
        'message', 'niveau', 'expertise',
    ];


    protected $casts = [
        'expertise' => 'array',
    ];
}
