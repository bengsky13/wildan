<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->integer('kopas')->nullable();
            $table->string('namepas');
            $table->date('ttlpas')->nullable();
            $table->string('jenkelpas')->nullable();
            $table->string('usiapas')->nullable();
            $table->text('alamatpas')->nullable();
            $table->string('telppas')->nullable();
            $table->string('kontdarpas')->nullable();
            $table->string('tipas')->nullable();
            $table->date('tangdappas')->nullable();
            $table->date('tangkempas')->nullable();
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
        Schema::dropIfExists('pasien');
    }
}
