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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->integer("nik");
            $table->string("full_name");
            $table->integer("kk");
            $table->text("address");
            $table->integer("rt");
            $table->integer("rw");
            $table->string("kelurahan");
            $table->string("kecamatan");
            $table->string("kota");
            $table->string("provinsi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
