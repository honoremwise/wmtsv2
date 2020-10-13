<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
      'reference_no', 'regno', 'level_of_study',
  ];
}
