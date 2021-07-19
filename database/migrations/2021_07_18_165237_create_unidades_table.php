<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();

            $table->string('unidades'); //cm, m, km
            $table->string('descrição');

            $table->timestamps();
        });

        //relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');

        });

        //relacionamento com a tabela produtos_detalhes
        Schema::table('product_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remover a key de protudos
        Schema::table('produtos', function(Blueprint $table){
            //removendo a key de produtos
            $table->dropforeign('produtos_unidade_id_foreign');

            //removendo a coluna
            $table->dropColumn('unidade_id');    

        });

         //remover a key de protudos detalhes
         Schema::table('product_detalhes', function(Blueprint $table){
            //removendo a key de produtos
            $table->dropforeign('product_detalhes_unidade_id_foreign');

            //removendo a coluna
            $table->dropColumn('unidade_id');
            

        });

        Schema::dropIfExists('unidades');
    }
}
