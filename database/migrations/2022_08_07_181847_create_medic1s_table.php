<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedic1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medic1s', function (Blueprint $table) {
            $table->id();
            $table->string('noremed');
            $table->string('kopasant');
            $table->string('namapasant');
            $table->string('tipasant');
            $table->date('tangantpas');
            $table->string('berat');
            $table->string('tinggi');
            $table->string('lingper');
            $table->string('suhu');
            $table->string('tekdar');
            $table->timestamps();
            $table->string('alergi');
            $table->string('kolest');
            $table->string('asur');
            $table->string('glukos');
            $table->string('hemog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medic1s');
    }
}
