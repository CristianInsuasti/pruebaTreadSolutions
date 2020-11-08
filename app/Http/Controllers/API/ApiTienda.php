<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tienda;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function consultarProductos()
    {

        $data = DB::table('productos')
            ->join('tiendas', 'tiendas.id_tienda', '=', 'productos.id_tienda')
            ->select('productos.*', 'tiendas.nombre as nombre_tienda')
            ->where('estado', '1')
            ->get();

        if ($data->isEmpty()) {

            return response()->json(['menssage' => 'No se encontraron registros'], 401);
        } else {

            return response()->json(['menssage' => 'OK', 'data' => $data], 201);
        }
    }

    public function consultarProductoTienda(Request $request)
    {
        $data = DB::table('productos')
            ->join('tiendas', 'tiendas.id_tienda', '=', 'productos.id_tienda')
            ->select('productos.*', 'tiendas.nombre  as nombre_tienda')
            ->where('tiendas.id_tienda', '=', $request->id_tienda)
            ->where('estado', '1')
            ->get();
        if ($data->isEmpty()) {

            return response()->json(['menssage' => 'FAIL', 'info' => 'No se encontraron registros'], 401);
        } else {

            return response()->json(['menssage' => 'OK', 'data' => $data], 201);
        }
    }

    public function agregarProductoTienda(Request $request)
    {
        $producto = new Producto();

        if (Producto::where('sku', '=', $request->sku)->exists()) {

            return response()->json(['menssage' => 'Faild', 'info' => 'el SKU ya existe'], 200);
        } else {

            $producto->id_tienda = $request->id_tienda;
            $producto->nombre = $request->nombre;
            $producto->sku = $request->sku;
            $producto->descripcion = $request->descripcion;
            $producto->valor = $request->valor;
            $producto->imagen = $request->imagen;
            $producto->estado = '1';

            $producto->save();
        }

        if ($producto) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'fail'], 401);
        }
    }

    public function actualizarProducto(Request $request)
    {
        $producto = new Producto();
        $producto = Producto::where('id_producto', '=', $request->id_producto)
            ->update([
                "id_tienda" => $request->id_tienda,
                "nombre" => $request->nombre,
                "descripcion" => $request->descripcion,
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
        $producto = Producto::where('id_producto', '=', $request->id_producto)
            ->update([
                "estado" => "2",
            ]);

        if ($producto) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }

    public function consultarTiendas()
    {
        $sql = DB::table('tiendas')->get();

        if ($sql) {
            return response()->json(['menssage' => 'OK', 'data' => $sql], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }
}
