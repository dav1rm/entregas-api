<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->integer('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->char('estado', 2)->nullable();
            $table->text('complemento')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('entrega_id')->nullable();

            $table->foreign('entrega_id')->references('id')->on('entregas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
