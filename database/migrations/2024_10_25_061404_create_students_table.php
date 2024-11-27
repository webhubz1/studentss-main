<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->unique(); // Add student_id column, make it unique
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->integer('age');
            $table->enum('sex', ['Male', 'Female']);
            $table->string('program');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('contact_no');
            $table->string('father_name');
            $table->string('father_contact_no')->nullable();
            $table->string('mother_name');
            $table->string('mother_contact_no')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_contact_no')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('high_school_name');
            $table->integer('graduation_year');
            $table->string('previous_college')->nullable();
            $table->string('highest_level_completed');
            $table->string('school_year');
           
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
