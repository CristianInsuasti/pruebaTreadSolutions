<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Producto extends Model
{
    public $timestamps = false;
    protected $table = "productos";
    protected $primaryKey = "id_producto";

    public function tienda()
    {
        return $this->belongsTo('App\Tienda');
    }
}
