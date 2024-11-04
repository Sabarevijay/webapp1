<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academics extends Model
{
    use HasFactory;
    protected $fillable = [
          'Reg no',
          'Student name',
          'Dept',
          'Course Code',
          'Course Title',
          'Exam Name',
          'Semester',
          'Total Mark'    
    ];
}
