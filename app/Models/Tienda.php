<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    public $timestamps = false;
    protected $table = "tiendas";
    protected $primaryKey = "id_tienda";

    public function productos()
    {
        $this->hasMany('App\Producto');
    }
}
