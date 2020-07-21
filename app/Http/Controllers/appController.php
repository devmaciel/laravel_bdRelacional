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
        //relação de um para um

        //vai buscar o cliente e respectivo telefone
        $cliente = cliente::find($id);
        $telefone = $cliente->telefone->numero;
        // return $cliente->nome.' - '.$telefone;

        return view('apresentar', compact('cliente', 'telefone'));
    }
}
