<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmTutorat extends Model
{
    use HasFactory;
    protected $fillable = [
        'message', 'niveau', 'expertise','user_id',
    ];


    protected $casts = [
        'expertise' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
