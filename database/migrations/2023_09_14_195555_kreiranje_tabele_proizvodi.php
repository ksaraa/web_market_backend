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
        Schema::create('proizvodi', function (Blueprint $table) {
            $table->id();
            $table->string('ime');
            $table->text('opis')->nullable();
            $table->decimal('cena', 10, 2);
            $table->integer('kolicina_na_stanju');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proizvodi');
    }
};
