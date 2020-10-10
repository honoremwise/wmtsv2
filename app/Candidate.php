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
      'username','college1','university1','seminary1',
      'application_referrence_no','english_proficiency','native_languages','other_language1','other_language2',
      'high_school','denomination_name','denomination','ordained_status','ordained_church',
      'treatment_status','treatment_description','application_motivation','bibliography',
      'photo','advanced_diploma_file','recommendation_file','nid_passport_file','bacholor_file','bankslip',
    ];
    protected $hidden = [
    'password',
  ];
}
