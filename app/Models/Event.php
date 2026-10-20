<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'event_time',
        'venue',
        'leader_id',
    ];

    public function leader()
    {
        return $this->belongsTo(Leader::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
