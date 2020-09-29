<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('application_referrence_no')->unique(); 
            $table->string('first_name');
            $table->string('last_name');
            $table->string('dob');
            $table->string('nid_passport_number')->unique();
            $table->string('birthplace');
            $table->string('country');
            $table->string('phone')->unique();
            $table->string('fax');
            $table->string('email')->unique();
            $table->string('city_province');
            $table->string('district');
            $table->string('sector');
            $table->string('cell');
            $table->string('village');
            $table->string('street');
            $table->string('english_proficiency');
            $table->string('other_language1');
            $table->string('other_language2');
            $table->string('other_language3');
            $table->string('high_school');
            $table->string('college1');
            $table->string('college2');
            $table->string('university1');
            $table->string('university2');
            $table->string('seminary1');
            $table->string('seminary2');
            $table->string('program');
            $table->string('denomination');
            $table->string('denomination_name');
            $table->string('ordained_status');
            $table->string('ordained_church');
            $table->string('treatment_status');
            $table->string('treatment_description');
            $table->text('bibliography');
            $table->text('application_motivation');
            $table->string('photo');
            $table->string('advanced_diploma_file');
            $table->string('recommendation_file');
            $table->string('nid_passport_file');
            $table->string('bacholor_file');
            $table->string('bankslip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
