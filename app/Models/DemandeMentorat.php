<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeMentorat extends Model
{
   
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prenom',
        'nom',
        'email',
        'phone',
        'domain',
        'current_level',
        'motivation',
        'documents',
        'valide',
    ];

    protected $casts = [
        'documents' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
