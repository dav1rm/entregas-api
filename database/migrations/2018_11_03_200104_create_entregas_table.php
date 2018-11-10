<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor', 8, 2);
            $table->decimal('taxa', 8, 2);
            $table->string('nome_cliente');
            $table->string('telefone_cliente');
            $table->string('pagamento');
            $table->unsignedInteger('entregador_id')->nullable();
            $table->unsignedInteger('vendedor_id')->nullable();
            $table->timestamps();

            $table->foreign('entregador_id')->references('id')->on('users');
            $table->foreign('vendedor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entregas');
    }
}
