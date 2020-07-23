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
        // Compras
        //======================================================
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id_compra');
            $table->unsignedInteger('id_cliente');
            $table->string('produto');
            $table->integer('quantidade');
            $table->timestamps();

            //Criação da Relação (chave estrangeira)
            $table->foreign('id_cliente')
                ->references('id_cliente')
                ->on('clientes')
                ->onDelete('cascade');
        });


    //     //======================================================
    //     // Vendas
    //     //======================================================
    //     Schema::create('vendas', function (Blueprint $table) {
    //         $table->increments('id_venda');
    //         $table->unsignedInteger('id_cliente');
    //         $table->string('produto');
    //         $table->string('preco', 2);
    //         $table->timestamps();

    //         //Criação da Relação (chave estrangeira)
    //         $table->foreign('id_cliente')
    //             ->references('id_cliente')
    //             ->on('clientes')
    //             ->onDelete('cascade');
    //     });


        //aula102
        //funcionarios
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        //funcoes;cargo
        Schema::create('funcoes', function (Blueprint $table) {
            $table->id();
            $table->string('funcao');
            $table->timestamps();
        });

        //ligacao entre funcionarios e funcoes
        Schema::create('funcionarios_funcoes', function (Blueprint $table) {

            //relação com a tabela funcionários
            $table->integer('id_funcionario')->unsigned();

            $table->foreign('id_funcionario')
                    ->references('id')
                    ->on('funcionarios')
                    ->onDelete('cascade');

            $table->foreign('id_funcao')
                    ->references('id')
                    ->on('funcoes')
                    ->onDelete('cascade');

            $table->timestamps();
        });

    }
    //---------------------------------------------------------------
    public function down()
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('compras');

        //aula102
        Schema::dropIfExists('funcionarios');
        Schema::dropIfExists('funcoes');
        Schema::dropIfExists('funcionarios_funcoes');
    }
}
