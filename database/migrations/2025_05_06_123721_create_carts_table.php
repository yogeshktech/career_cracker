<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); 
            $table->string('ip_address')->nullable();
            $table->timestamps();

            $table->unique(['course_id', 'user_id', 'ip_address'], 'unique_cart_entry');
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};