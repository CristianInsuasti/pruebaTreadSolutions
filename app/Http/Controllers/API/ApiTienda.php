<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Tienda;
use Illuminate\Http\Request;

class ApiTienda extends Controller
{
    public function addTienda(Request $request)
    {

        $tienda = new Tienda();
        $tienda->nombre = $request->nombre;
        $tienda->fecha_apertura = $request->fecha_apertura;

        $tienda->save();

        
        if ($tienda) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }

    }
}
