<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabase extends Migration
{

    public function up()
    {
        //======================================================
        // Clientes
        //======================================================
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('nome');
            $table->string('email');
            $table->timestamps();
        });

        //======================================================
        // Telefones
        //======================================================
        Schema::create('telefones', function (Blueprint $table) {
            $table->increments('id_telefone');
            $table->unsignedInteger('id_cliente');
            $table->string('numero');
            $table->timestamps();

            //Criação da Relação (chave estrangeira)
            $table->foreign('id_cliente')
                ->references('id_cliente')
                ->on('clientes')
                ->onDelete('cascade');
        });


        //======================================================
        // Vendas
        //======================================================
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id_venda');
            $table->unsignedInteger('id_cliente');
            $table->string('produto');
            $table->string('preco', 2);
            $table->timestamps();

            //Criação da Relação (chave estrangeira)
            $table->foreign('id_cliente')
                ->references('id_cliente')
                ->on('clientes')
                ->onDelete('cascade');
        });
    }

    //---------------------------------------------------------------
    public function down()
    {
        Schema::dropIfExists('teste');
    }
}
