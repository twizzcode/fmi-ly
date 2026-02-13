<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationStructure extends Model
{

    protected $fillable = [
        'department_name', 
        'members'
    ];

    
    protected $casts = [
        'members' => 'array', 
    ];
}