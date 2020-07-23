<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class funcoes extends Model
{
    public function funcionarios()
    {
        return $this->belongsToMany('App\funcionarios',
        'funcionarios_funcoes', //nome da tabela
        'id_funcao', //id da funcao
        'id_funcionario'); //id do funcionario
    }
}
