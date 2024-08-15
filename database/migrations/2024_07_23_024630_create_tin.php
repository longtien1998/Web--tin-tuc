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
        if (!Schema::hasTable('tin')) {
            Schema::create('tin', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('lang', 5);
                $table->string('tieuDe', 255);
                $table->string('url', 255)->unique();
                $table->string('tomTat', 255);
                $table->string('hinhAnh', 255);
                $table->longText('noiDung');
                $table->unsignedBigInteger('loaiTinId');
                $table->foreign('loaiTinId')->references('id')->on('theloaitin')->onDelete('cascade');
                $table->unsignedBigInteger('nguoiDangId');
                $table->foreign('nguoiDangId')->references('id')->on('users')->onDelete('cascade');
                $table->integer('soLanXem')->default(0);
                $table->boolean('noiBat')->default(0);
                $table->boolean('anHien')->default(0);
                $table->string('tags', 150)->nullable();
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
        Schema::dropIfExists('tin');
    }
};
