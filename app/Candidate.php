<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Candidate extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   use Notifiable;
   protected $table="candidates";
   protected $guard = 'student';
   protected $fillable = [
      'first_name',
      'last_name',
      'phone','dob','birthplace','country',
      'nid_passport_number','fax','city_province',
      'program','district','sector','cell','village','street',
      'email',
      'password',
      'username',
      'application_referrence_no',
    ];
    protected $hidden = [
    'password',
  ];
}
