<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('sku'); //codigo universal do produto 
              $table->string('titulo');
               $table->longtext('descricao');
                $table->float('preco',8,2);//total de digitos 8 e 2(campos após virgula)
             $table->timestamps();
             $table->enum('ativo' , ['S','N'])->default('S');
         });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
