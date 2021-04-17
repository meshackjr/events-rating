<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_category_id',
        'name',
        'location',
        'date',
        'agent_id',
        'description',
        'banner'
    ];

    public function category(){
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function getImage(){
        return asset('images/sample_logo.jpeg');
    }

    public function getDate(){
        return Carbon::make($this->date)->diffForHumans();
    }
}
