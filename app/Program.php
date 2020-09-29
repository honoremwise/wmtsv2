<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'program_name','number_of_levels','description','maximum_modules',
  ];
}
