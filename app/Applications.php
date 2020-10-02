<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
  protected $table="applications";
  protected $fillable = [
      'reference_no', 'status', 'number_of_application','latest_application_year',
  ];
}
