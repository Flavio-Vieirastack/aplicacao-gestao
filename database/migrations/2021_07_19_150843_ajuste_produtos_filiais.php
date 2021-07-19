<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a tabela filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();


        });

        //criando a tabela produto_filiais
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger ('produto_id');
            $table->unsignedBigInteger ('filial_id');

            $table->float('Preço_venda', 8,2)->default(1);
            $table->integer('estoque_minimo')->default(0);
            $table->integer('estoque_maximo')->default(100);

            $table->timestamps();

            //relacionemento
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //removendo colunas da tabela produtos

        schema::table('produtos', function(Blueprint $table){
            $table->dropColumn(['Preço_venda', 'estoque_minimo', 'estoque_maximo']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('produtos', function(Blueprint $table){
            $table->float('Preço_venda', 8,2)->default(1);
            $table->integer('estoque_minimo')->default(0);
            $table->integer('estoque_maximo')->default(100);

        });
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
}