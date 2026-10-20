<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    protected $fillable = [
    'title',
    'author',
    'category',
    'quantity',
    'description'
];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
