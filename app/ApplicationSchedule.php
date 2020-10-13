<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationSchedule extends Model
{
  protected $fillable = [
      'program_id','application_start_date','application_close_date',
  ];
}
