<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'content',
        'question_id', 
        'user_id',
        'likes',
       // Ajoutez la colonne 'question_id' au tableau fillable
    ];
    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
