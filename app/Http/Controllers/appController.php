<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\cliente;
use App\telefone;

use App\funcionarios;
use App\funcoes;

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

    public function proprietario($numero)
    {
        //relação INVERSA (N-1)
        // $telefone = telefone::where('numero', $numero)->first();
        // $cliente = $telefone->proprietario;
        // return $cliente;

        //Solução pra sem o withDefault();
        $telefone = telefone::where('numero', $numero)->get()->first();
        if($telefone != null){
            $cliente = $telefone->proprietario;
            return $cliente;
        }else{
            // $erro = ['erro'];
            // return view('view_do_erro', compact('erro'));
            return 'Telefone não existe';
        }


    }

    //-------------------------------
    //AULA102+
    //---------------------------------------
    public function funcionarios($id)
    {
        $funcionario = funcionarios::find($id);
        $funcoes = $funcionario->funcoes; //funcoes é o método do model
        // return $funcionario.'<br>'.$funcoes;

        //apresentar os dados
        echo '<p>'.$funcionario->nome.'</p>'; //nome do funcionario

        //apresentar todas funcoes do usuário
        echo '<ul>';
        foreach ($funcoes as $f){
            echo '<li>'.$f->funcao.'</li>';
        }
        echo '</ul>';
    }

    public function funcoes($id)
    {
        // admin\coordenador\operario
        $funcao = funcoes::find($id);
        $funcionarios = $funcao->funcionarios; //método funcionarios

        //apresentar os dados
        echo '<p>'.$funcao->funcao.'</p>'; //variavao funcao, com o attr funcao

        //pega nome do usuario e de acrodo com a funcao, inverso
        echo '<ul>';
        foreach ($funcionarios as $f){
            echo '<li>'.$f->nome.'</li>';
        }
        echo '</ul>';

    }
}
