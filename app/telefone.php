<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telefone extends Model
{
    protected $primaryKey = 'id_telefone';

    public function proprietario()
    {
        //Aqui o problema é quando retorna NULL, precisa tratar.

        //Solução Implementando próprio if com NULL
        return $this->belongsTo('App\cliente', 'id_cliente');

        //Solução com With Default
        // return $this->belongsTo('App\cliente', 'id_cliente')
        // ->withDefault([
        //     'nome' => 'Nenhum telefone encontrado',
        // ]);
    }

}
