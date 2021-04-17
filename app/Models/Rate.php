<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'review',
        'event_id',
        'agent_id'
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function answers(){
        return $this->hasManyThrough(Answer::class, Question::class);
    }
}
