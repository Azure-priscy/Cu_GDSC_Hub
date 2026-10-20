<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
  protected $fillable = [
    'title',
    'author',
    'category',
    'description',
    'resource_type',
    'resource_link',
    'file_path',
];  
}
