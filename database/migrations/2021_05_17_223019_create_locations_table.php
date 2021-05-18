<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            /*
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
            */
            //abaixo vou motrar um comando mais "resumido" pro código comentado acima
            $table->foreignId('country_id')//=> foreign() + unsignedBigInteger()
                ->constrained('countries')//de que tabela tá ligando a chave estrangeira
                ->onDelete('cascade');
            $table->integer('latitude');
            $table->integer('longitude');
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
        Schema::dropIfExists('locations');
    }
}
