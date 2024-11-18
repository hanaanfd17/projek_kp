<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodysTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Tabel `bodys1s`
        Schema::create('bodys1s', function (Blueprint $table) {
            $table->id();
            $table->string('menu');
            $table->timestamps();
        });

        // Tabel `bodys2s`
        Schema::create('bodys2s', function (Blueprint $table) {
            $table->id();
            $table->string('menu');
            $table->timestamps();
        });

        // Tabel `bodys3s`
        Schema::create('bodys3s', function (Blueprint $table) {
            $table->id();
            $table->string('menu');
            $table->timestamps();
        });

        // Tabel `bodys4s`
        Schema::create('bodys4s', function (Blueprint $table) {
            $table->id();
            $table->string('menu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bodys4s');
        Schema::dropIfExists('bodys3s');
        Schema::dropIfExists('bodys2s');
        Schema::dropIfExists('bodys1s');
    }
}