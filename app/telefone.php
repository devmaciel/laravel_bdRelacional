<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telefone extends Model
{
    protected $primaryKey = 'id_telefone';

    public function proprietario()
    {
        return $this->belongsTo('App\cliente', 'id_cliente');
    }
}
