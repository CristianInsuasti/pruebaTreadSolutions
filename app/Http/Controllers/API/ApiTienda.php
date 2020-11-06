<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tienda;
use App\Models\Producto;
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

    public function agregarProductoTienda(Request $request)
    {
        $producto = new Producto();
        $producto->id_tienda = $request->id_tienda;
        $producto->nombre = $request->nombre;
        $producto->sku = $request->sku;
        $producto->valor = $request->valor;
        $producto->imagen = $request->imagen;
        $producto->estado = '1';

        $producto->save();

        if ($producto) {
            return response()->json(['message' => 'OK'], 201);
        } else {
            return response()->json(['message' => 'OK'], 401);
        }
    }

    public function actualizarProducto(Request $request)
    {
        $producto = new Producto();
        $producto = Producto::where('id_tienda', '=', $request->id_tienda)
            ->update([
                "id_tienda" => $request->id_tienda,
                "nombre" => $request->nombre,
                "sku" => $request->sku,
                "valor" => $request->valor,
                "imagen" => $request->imagen,
            ]);

        if ($producto) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }

    public function desactivarProducto(Request $request)
    {
        $producto = new Producto();
        $producto = Producto::where('id_tienda', '=', $request->id_tienda)
            ->update([
                "estado" => "2",
            ]);

        if ($producto) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }
}
