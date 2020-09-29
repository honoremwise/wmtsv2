<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'first_name','last_name','phone','nid_passport_number',
      'program', 'email', 'password','username','	application_refence_no'
  ];
}
