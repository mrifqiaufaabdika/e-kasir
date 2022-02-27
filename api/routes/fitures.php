<?php

/**
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 *
 * @var Illuminate\Support\Facades\Route $router
 */

use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\KategoriPegawaiController;
use App\Http\Controllers\PegawaiController;
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
#next_route
