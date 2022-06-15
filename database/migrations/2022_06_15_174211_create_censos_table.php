<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCensosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('censos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('persona_id', null, true)->index();

            $table->foreign('persona_id')->references('id')->on('personas')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('municipio_id', null, true)->index();

            $table->foreign('municipio_id')->references('id')->on('municipios')
            ->onUpdate('cascade')->onDelete('cascade');

        
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
        Schema::dropIfExists('censos');
    }
}
