<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('pedidos', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unsigned(); //somente inteiros positivos
            $table->enum('status',['RE','PA','CA']);//Reservado ,Pago,Cancelado!
            $table->timestamps();//data de criacao ou update
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
        Schema::dropIfExists('pedidos');
    }
}
