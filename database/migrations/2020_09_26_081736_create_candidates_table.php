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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('nid_passport_number')->unique();
            $table->string('birthplace')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->unique();
            $table->string('fax')->nullable();
            $table->string('email')->unique();
            $table->string('city_province')->nullable();
            $table->string('district')->nullable();
            $table->string('sector')->nullable();
            $table->string('cell')->nullable();
            $table->string('village')->nullable();
            $table->string('street')->nullable();
            $table->string('english_proficiency')->nullable();
            $table->string('other_language1')->nullable();
            $table->string('other_language2')->nullable();
            $table->string('native_languages')->nullable();
            $table->string('high_school')->nullable();
            $table->string('college1')->nullable();
            $table->string('university1')->nullable();
            $table->string('seminary1')->nullable();
            $table->string('program')->nullable();
            $table->string('denomination')->nullable();
            $table->string('denomination_name')->nullable();
            $table->string('ordained_status')->nullable();
            $table->string('ordained_church')->nullable();
            $table->string('treatment_status')->nullable();
            $table->string('treatment_description')->nullable();
            $table->text('bibliography')->nullable();
            $table->text('application_motivation')->nullable();
            $table->string('photo')->nullable();
            $table->string('advanced_diploma_file')->nullable();
            $table->string('recommendation_file')->nullable();
            $table->string('nid_passport_file')->nullable();
            $table->string('bacholor_file')->nullable();
            $table->string('bankslip')->nullable();
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
