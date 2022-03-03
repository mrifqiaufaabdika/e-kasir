<?php

/**
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 *
 * @var Illuminate\Support\Facades\Route $router
 */

use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\KategoriPegawaiController;
use App\Http\Controllers\SatuanBarang;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\InventarisBarangController;
use App\Http\Controllers\InventarisBarangControllerController;
use App\Http\Controllers\ProdukController;
#next_use

$router->group(['prefix' => 'permissions'], function () use ($router) {
    $router->get('all', [PermissionsController::class, 'index']);
    $router->get('detail/{id}', [PermissionsController::class, 'show']);
    $router->get('edit/{id}', [PermissionsController::class, 'edit']);
    $router->get('create', [PermissionsController::class, 'create']);
    $router->post('baru', [PermissionsController::class, 'store']);
    $router->post('update', [PermissionsController::class, 'update']);
    $router->delete('delete/{id}', [PermissionsController::class, 'destroy']);
});

$router->group(['prefix' => 'kategori-pegawai'], function () use ($router) {
    $router->get('all', [KategoriPegawaiController::class, 'index']);
    $router->get('detail/{id}', [KategoriPegawaiController::class, 'show']);
    $router->get('edit/{id}', [KategoriPegawaiController::class, 'edit']);
    $router->get('create', [KategoriPegawaiController::class, 'create']);
    $router->post('baru', [KategoriPegawaiController::class, 'store']);
    $router->post('update', [KategoriPegawaiController::class, 'update']);
    $router->delete('delete/{id}', [KategoriPegawaiController::class, 'destroy']);
});

$router->group(['prefix' => 'pegawai'], function () use ($router) {
    $router->get('all', [PegawaiController::class, 'index']);
    $router->get('detail/{id}', [PegawaiController::class, 'show']);
    $router->get('edit/{id}', [PegawaiController::class, 'edit']);
    $router->get('create', [PegawaiController::class, 'create']);
    $router->post('baru', [PegawaiController::class, 'store']);
    $router->post('update', [PegawaiController::class, 'update']);
    $router->delete('delete/{id}', [PegawaiController::class, 'destroy']);
});

$router->group(['prefix' => 'satuan-barang'], function () use ($router) {
    $router->get('all', [SatuanBarang::class, 'index']);
    $router->get('detail/{id}', [SatuanBarang::class, 'show']);
    $router->get('edit/{id}', [SatuanBarang::class, 'edit']);
    $router->get('create', [SatuanBarang::class, 'create']);
    $router->post('baru', [SatuanBarang::class, 'store']);
    $router->post('update', [SatuanBarang::class, 'update']);
    $router->delete('delete/{id}', [SatuanBarang::class, 'destroy']);
});

$router->group(['prefix' => 'barang'], function () use ($router) {
    $router->get('all', [BarangController::class, 'index']);
    $router->get('detail/{id}', [BarangController::class, 'show']);
    $router->get('edit/{id}', [BarangController::class, 'edit']);
    $router->get('create', [BarangController::class, 'create']);
    $router->post('baru', [BarangController::class, 'store']);
    $router->post('update', [BarangController::class, 'update']);
    $router->delete('delete/{id}', [BarangController::class, 'destroy']);
});
$router->group(['prefix' => 'inventaris'], function () use ($router) {
    $router->get('all', [InventarisBarangController::class, 'index']);
    $router->get('detail/{id}', [InventarisBarangController::class, 'show']);
    $router->get('edit/{id}', [InventarisBarangController::class, 'edit']);
    $router->get('create', [InventarisBarangController::class, 'create']);
    $router->post('baru', [InventarisBarangController::class, 'store']);
    $router->post('update', [InventarisBarangController::class, 'update']);
    $router->delete('delete/{id}', [InventarisBarangController::class, 'destroy']);
});
$router->group(['prefix' => 'Produk'], function () use ($router) {
    $router->get('all', [ProdukController::class, 'index']);
    $router->get('detail/{id}', [ProdukController::class, 'show']);
    $router->get('edit/{id}', [ProdukController::class, 'edit']);
    $router->get('create', [ProdukController::class, 'create']);
    $router->post('baru', [ProdukController::class, 'store']);
    $router->post('update', [ProdukController::class, 'update']);
    $router->delete('delete/{id}', [ProdukController::class, 'destroy']);
});
#next_route
