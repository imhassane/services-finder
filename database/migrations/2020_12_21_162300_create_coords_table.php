<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coords', function (Blueprint $table) {
            $table->id();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('quartier')->nullable();
            $table->string('prefecture')->default('conakry');
            $table->foreignId('worker_id')->constrained()->onDelete('restrict');
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
        Schema::dropIfExists('coords');
    }
}
