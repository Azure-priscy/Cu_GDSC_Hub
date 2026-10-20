<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;

class Student extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'department',
        'level',
        'interest_area',
        'date_joined'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }

}

