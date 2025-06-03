<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLpaColumnsToStringInCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('max_lpa')->nullable()->change();
            $table->string('min_lpa')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->decimal('max_lpa', 8, 2)->nullable()->change();
            $table->decimal('min_lpa', 8, 2)->nullable()->change();
        });
    }
}

