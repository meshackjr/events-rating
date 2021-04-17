<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'review'
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }

    public function answers(){
        return $this->hasManyThrough(Answer::class, Question::class);
    }
}
