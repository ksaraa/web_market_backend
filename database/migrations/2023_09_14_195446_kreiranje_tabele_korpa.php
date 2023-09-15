<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korpa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('korisnik_id');
            $table->unsignedBigInteger('proizvodi_id');
            $table->integer('kolicina')->default(1);
            $table->timestamps();

            $table->foreign('korisnik_id')->references('id')->on('korisnik')->onDelete('cascade');
            $table->foreign('proizvodi_id')->references('id')->on('proizvodi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('korpa');
    }
};
