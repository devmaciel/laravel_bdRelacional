<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $primaryKey = 'id_cliente';

    public function telefone()
    {
        //(1-1) Um para um
        return $this->hasOne('App\telefone', 'id_cliente');
    }

    public function telefones()
    {
        //(1-N) Um para muitos
        return $this->hasMany('App\telefone', 'id_cliente');
    }
}
