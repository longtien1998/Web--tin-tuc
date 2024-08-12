<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('theloaitin', function (Blueprint $table) {
            $table->id();
            $table->string('lang', 5);
            $table->string('ten', 255);
            $table->integer('thuTu');
            $table->string('moTa', 255);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theloaitin');
    }
};
