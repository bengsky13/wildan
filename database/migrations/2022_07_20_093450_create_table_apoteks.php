<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableApoteks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_apoteks', function (Blueprint $table) {
            $table->id();
            $table->string('kobat')->nullable();
            $table->string('namobat')->unique();
            $table->string('jenobat')->nullable();
            $table->string('kemobat')->nullable();
            $table->string('satobat')->nullable();
            $table->integer('stokobat')->nullable();
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
        Schema::dropIfExists('table_apoteks');
    }
}
