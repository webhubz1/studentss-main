<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('students', function (Blueprint $table) {
        $table->string('college_year_level')->nullable(); // Adjust datatype as needed
    });
}

public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropColumn('college_year_level');
    });
}
};