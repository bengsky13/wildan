<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApoteksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoteks', function (Blueprint $table) {
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
        Schema::dropIfExists('apoteks');
    }
}
