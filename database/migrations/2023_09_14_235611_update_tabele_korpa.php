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
        Schema::table('korpa', function (Blueprint $table) {
            $table->string('ime')->after('id');
            $table->decimal('cena', 10, 2)->after('ime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('korpa', function (Blueprint $table) {
            $table->dropColumn('ime');
            $table->dropColumn('cena');
            $table->dropColumn('kolicina');
        });
    }
};
