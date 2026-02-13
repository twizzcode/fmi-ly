<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkService extends Model
{
    protected $fillable = ['judul', 'keterangan', 'url'];
}
