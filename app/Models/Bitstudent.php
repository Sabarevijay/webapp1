<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitstudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'regnumber',
        'name',
        'year',
        'department',
        'emailid',
    ];
}
