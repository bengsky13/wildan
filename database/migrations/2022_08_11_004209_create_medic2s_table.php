<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedic2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medic2s', function (Blueprint $table) {
            $table->id();
            $table->string('noremed');
            $table->string('kopasant');
            $table->string('tangantpas');
            $table->string('keluhan');
            $table->string('namdok');
            $table->string('periksa');
            $table->string('diagnosa');
            $table->string('noresep');
            $table->string('obat');
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
        Schema::dropIfExists('medic2s');
    }
}
