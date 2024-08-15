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
        if (!Schema::hasTable('thelaoitin')) {
            Schema::create('theloaitin', function (Blueprint $table) {
                $table->id();
                $table->string('lang', 5);
                $table->string('ten', 255);
                $table->Integer('thuTu');
                $table->string('url', 255)->unique();
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theloaitin');
    }
};
