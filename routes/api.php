<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("guardar-tienda", "API\ApiTienda@addTienda");
Route::get("consultar-productos", "API\ApiTienda@consultarProductos");
route::post("guardar-productos", "API\ApiTienda@agregarProductoTienda");
route::post("actualizar-productos", "API\ApiTienda@actualizarProducto");
route::post("desactivar-producto", "API\ApiTienda@desactivarProducto");
route::post("consultar-producto", "API\ApiTienda@consultarProductoTienda");
route::get("consultar-tiendas", "API\ApiTienda@consultarTiendas");