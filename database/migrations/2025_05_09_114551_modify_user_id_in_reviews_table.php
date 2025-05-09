<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUserIdInReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Drop existing foreign key constraint
            $table->dropForeign(['user_id']);
            // Drop the user_id column
            $table->dropColumn('user_id');
            // Re-add user_id as nullable
            $table->unsignedBigInteger('user_id')->nullable()->after('course_id');
            // Re-add foreign key with ON DELETE SET NULL
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Reverse the changes
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->unsignedBigInteger('user_id')->nullable()->after('course_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}