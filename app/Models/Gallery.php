<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
    'title',
    'image',
    'content',
    'description',
    'date_of_event',
];
}
