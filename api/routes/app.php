<?php


/**
 *
 * @var Illuminate\Support\Facades\Route $router
 */

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

$router->group(['prefix' => 'app'], function () use ($router) {

    $router->group(['prefix' => 'produk'], function () use ($router) {
        $router->get('all', [ProdukController::class, 'index']);
        $router->get('detail/{id}', [ProdukController::class, 'show']);
        $router->post('update', [BarangController::class, 'update']);
    });

    $router->group(['prefix' => 'transaksi'], function () use ($router) {
        $router->get('all', [TransaksiController::class, 'index']);
        $router->get('create', [TransaksiController::class, 'create']);
        $router->post('transaksi', [TransaksiController::class, 'store']);
        $router->post('update', [TransaksiController::class, 'update']);
        $router->delete('delete/{id}', [TransaksiController::class, 'destroy']);
    });




});
