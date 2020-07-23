<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class funcionarios extends Model
{
    public function funcoes()
    {
        return $this->belongsToMany('App\funcoes', //model
        'funcionarios_funcoes',  //nome_da_tabela
        'id_funcionario' ,  //id do funcionario reforçado nome
        'id_funcao'); //id da funcao
    }
}
