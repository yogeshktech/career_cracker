<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->string('title', 100);
            $table->decimal('mrp', 8, 2);
            $table->decimal('sale_price', 8, 2);
            $table->string('thumbnail')->nullable();
            $table->string('level')->nullable();
            $table->string('duration')->nullable();
            $table->integer('is_live_class')->nullable();
            $table->integer('total_lectures')->nullable();
            $table->string('language')->nullable();
            $table->text('overview')->nullable();
            $table->text('highlights')->nullable();
            $table->text('details')->nullable();
            $table->text('why_choose_us')->nullable();
            $table->foreignId('created_by')->constrained('admins')->onDelete('cascade');
            $table->integer('progress')->default(0);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}