<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLpaAndClassDatesToCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->decimal('max_lpa', 8, 2)->nullable()->after('is_saleable');
            $table->decimal('min_lpa', 8, 2)->nullable()->after('max_lpa');
            $table->date('pre_demo_start_date')->nullable()->after('min_lpa');
            $table->date('pre_demo_end_date')->nullable()->after('pre_demo_start_date');
            $table->date('regular_class_date')->nullable()->after('pre_demo_end_date');
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'max_lpa',
                'min_lpa',
                'pre_demo_start_date',
                'pre_demo_end_date',
                'regular_class_date',
            ]);
        });
    }
}
