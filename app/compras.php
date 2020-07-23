<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compras extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';

    public function cliente()
    {
        return $this->belongsTo('App\clientes');
    }
}
