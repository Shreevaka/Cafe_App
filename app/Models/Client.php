<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'contact',
        'email',
        'gender',
        'year',
        'month',
        'date',
        'street_no',
        'street_address',
        'city',
        'is_active',
        'image_path',
    ];
}
