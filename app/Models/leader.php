<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class leader extends Model
{
    protected $fillable = [
    'full_name',
    'email',
    'phone',
    'course',
    'level',
    'position',
    'date_joined',
];
public function events()
{
    return $this->hasMany(Event::class);
}

}


