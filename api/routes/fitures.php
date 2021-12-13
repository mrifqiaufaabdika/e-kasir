<?php

/**
 * Copyright (c) 2020. dibuat Oleh Tama Asrory Ridhana, S.T, MTA.
 * Lisensi ini hanya diberikan dan tidak dapat di perjual belikan kembali tanpa izin pembuat
 *
 * @var Illuminate\Support\Facades\Route $router
 */

use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\HalteController;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\PramudiController;
use App\Http\Controllers\RuteController;
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

$router->group(['prefix' => 'bus'], function () use ($router) {
    $router->get('all', [BusController::class, 'index']);
    $router->get('detail/{id}', [BusController::class, 'show']);
    $router->get('edit/{id}', [BusController::class, 'edit']);
    $router->get('create', [BusController::class, 'create']);
    $router->post('baru', [BusController::class, 'store']);
    $router->post('update', [BusController::class, 'update']);
    $router->delete('delete/{id}', [BusController::class, 'destroy']);
});
$router->group(['prefix' => 'halte'], function () use ($router) {
    $router->get('all', [HalteController::class, 'index']);
    $router->get('detail/{id}', [HalteController::class, 'show']);
    $router->get('edit/{id}', [HalteController::class, 'edit']);
    $router->get('create', [HalteController::class, 'create']);
    $router->post('baru', [HalteController::class, 'store']);
    $router->post('update', [HalteController::class, 'update']);
    $router->delete('delete/{id}', [HalteController::class, 'destroy']);
});
$router->group(['prefix' => 'perjalanan'], function () use ($router) {
    $router->get('all', [PerjalananController::class, 'index']);
    $router->get('detail/{id}', [PerjalananController::class, 'show']);
    $router->get('edit/{id}', [PerjalananController::class, 'edit']);
    $router->get('create', [PerjalananController::class, 'create']);
    $router->post('baru', [PerjalananController::class, 'store']);
    $router->post('update', [PerjalananController::class, 'update']);
    $router->delete('delete/{id}', [PerjalananController::class, 'destroy']);
});
$router->group(['prefix' => 'pramudi'], function () use ($router) {
    $router->get('all', [PramudiController::class, 'index']);
    $router->get('detail/{id}', [PramudiController::class, 'show']);
    $router->get('edit/{id}', [PramudiController::class, 'edit']);
    $router->get('create', [PramudiController::class, 'create']);
    $router->post('baru', [PramudiController::class, 'store']);
    $router->post('update', [PramudiController::class, 'update']);
    $router->delete('delete/{id}', [PramudiController::class, 'destroy']);
});
$router->group(['prefix' => 'rute'], function () use ($router) {
    $router->get('all', [RuteController::class, 'index']);
    $router->get('detail/{id}', [RuteController::class, 'show']);
    $router->get('edit/{id}', [RuteController::class, 'edit']);
    $router->get('create', [RuteController::class, 'create']);
    $router->post('baru', [RuteController::class, 'store']);
    $router->post('update', [RuteController::class, 'update']);
    $router->delete('delete/{id}', [RuteController::class, 'destroy']);
});
#next_route
