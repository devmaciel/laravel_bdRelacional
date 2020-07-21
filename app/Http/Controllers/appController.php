<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\cliente;
use App\telefone;

class appController extends Controller
{
    public function index($id)
    {
        //todos os clientes
        // return telefone::get(); //function do model

        //relação de um para um (1-1)
        //vai buscar o cliente e respectivo telefone
        $cliente = cliente::find($id);
        $telefone = $cliente->telefone->numero; //function telefone
        // return $cliente->nome.' - '.$telefone;

        return view('apresentar', compact('cliente', 'telefone'));
    }

    public function todos($id)
    {
        //relação de um para muitos (1-N)
        $cliente = cliente::find($id);
        $telefones = $cliente->telefones; //function telefones

        return view('apresentar_todos', compact('cliente','telefones'));
    }
}
