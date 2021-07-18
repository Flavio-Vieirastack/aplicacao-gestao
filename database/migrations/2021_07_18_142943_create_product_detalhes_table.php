<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detalhes', function (Blueprint $table) {
    //tabela inicio
            $table->id();
            
        //chave de referencia inicio
            $table->unsignedBigInteger('produto_id');
        //chave de referencia fim
        
            $table->float('comprimento',8,2);
            $table->float('largura',8,2);
            $table->float('altura',8,2);
        
        
            $table->timestamps();
    //tabela fim
        //contraints inicio
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id');
        //contraints fim
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detalhes');
    }
}
