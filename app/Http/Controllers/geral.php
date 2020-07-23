<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clientes;
use App\compras;

class geral extends Controller
{
    //================================================
    public function index()
    {
        return 'Bem-vindo!';
    }

    //================================================
    public function apresentarListaCliente()
    {
        //retorna todos clientes registrados na base de dados
        $clientes = clientes::all();
        return $clientes;
    }

    //================================================
    public function apresentarListaCompras()
    {
        //devolve a lista completa de todas compras registradas
        $compras = compras::all();
        return $compras;
    }

    //================================================
    public function apresentarCliente($id)
    {
        //devolve os dados de um cliente específico com (id = x)
        $cliente = clientes::find($id);
        return $cliente;
    }

    //================================================
    public function apresentarCompra($id)
    {
        //devolve os dados de um cliente específico com (id = x)
        $compra = compras::find($id);
        return $compra;
    }

    //================================================
    public function pesquisarCliente($pesquisa)
    {
        //procurar os dados do(s) cliente(s) que contenham o termo $pesquisa no nome
        $clientes = clientes::where('nome', 'like', '%'.$pesquisa.'%')->get();
        return $clientes;
    }

    //================================================
    public function totalClientes()
    {
        //retorna o número total de clientes registrados na base de dados
        $total = clientes::all()->count();
        return 'Número total de clientes: '.$total;
    }

     //================================================
     public function totalCompras()
     {
         //retorn o número total de compras
         $total = compras::all();
         return 'Número total de compras '.$total->count();
     }

     //================================================
     public function pesquisarClienteNomeEmail($pesquisa)
     {
         //pesquisar os cliente cujo nome e/ou email contenham o texto da pesquisa
         $clientes = clientes::where('nome', 'like', '%'.$pesquisa.'%')
                            ->orWhere('email', 'like', '%'.$pesquisa.'%')
                            ->get();
         return $clientes;
     }

     //================================================
     public function mostrarQuantidadeTotal()
     {
        //mostrar a quantidade total de produtos vendidos em todas as vendas
        $total = compras::all()->sum('quantidade');
        return 'Quantidade total de produtos vendidos: '.$total;
     }

    //================================================
    public function mostrarMediaQuantidadeProdutosPorVenda()
    {
        //apresenta a média de produtos adquiridos por cada compra
        $media = compras::all()->avg('quantidade');
        return 'Média de produtos vendidos por cada compra: '.$media;
    }

    //==========================================================
    public function mostrarQuantidadeMaiorCompra()
    {
        //apresentar a maior quantidade registrada numa compra
        $max = compras::all()->max('quantidade');
        return 'Quantidade máxima registrada: '.$max;
    }
}

