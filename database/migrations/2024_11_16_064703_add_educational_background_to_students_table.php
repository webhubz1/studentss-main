<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEducationalBackgroundToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Add 'high_school_name' column if it doesn't already exist
            if (!Schema::hasColumn('students', 'high_school_name')) {
                $table->string('high_school_name');
            }

            // Add 'graduation_year' column if it doesn't already exist
            if (!Schema::hasColumn('students', 'graduation_year')) {
                $table->integer('graduation_year');
            }

            // Add 'previous_college' column if it doesn't already exist
            if (!Schema::hasColumn('students', 'previous_college')) {
                $table->string('previous_college')->nullable();
            }

            // Add 'highest_level_completed' column if it doesn't already exist
            if (!Schema::hasColumn('students', 'highest_level_completed')) {
                $table->string('highest_level_completed');
            }

            // Add 'school_year' column if it doesn't already exist
            if (!Schema::hasColumn('students', 'school_year')) {
                $table->string('school_year');
            }
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Dropping the columns in case of rollback
            $table->dropColumn([
                'high_school_name',
                'graduation_year',
                'previous_college',
                'highest_level_completed',
                'school_year'
            ]);
        });
    }
}
