<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $primaryKey = 'id_cliente';

    public function telefone()
    {
        return $this->hasOne('App\telefone', 'id_cliente');
    }
}
