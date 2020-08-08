<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produtos', function (Blueprint $table) {
            
           $table->engine = 'InnoDB';

            $table->increments('id');

         
         $table->unsignedBigInteger('produto_id');
         $table->unsignedBigInteger('pedido_id');
            $table->enum('status',['RE','PA','CA']);//Reservado ,Pago,Cancelado!
            $table->decimal('valor',6,2)->default(0);
          
            //ligacoes com outras tabelas 
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
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
        Schema::dropIfExists('pedido_produtos');
    }
}
