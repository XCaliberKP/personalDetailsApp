<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile_number',
        'state',
        'city',
        'skills',
        'profile_image',
    ];

}
