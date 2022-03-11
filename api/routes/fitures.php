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
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\SatuanProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\KomisiController;
use App\Http\Controllers\DetailCuciController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\KasobController;
use App\Http\Controllers\KasbonController;
use App\Http\Controllers\BisnisController;
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
$router->group(['prefix' => 'produk'], function () use ($router) {
    $router->get('all', [ProdukController::class, 'index']);
    $router->get('detail/{id}', [ProdukController::class, 'show']);
    $router->get('edit/{id}', [ProdukController::class, 'edit']);
    $router->get('create', [ProdukController::class, 'create']);
    $router->post('baru', [ProdukController::class, 'store']);
    $router->post('update', [ProdukController::class, 'update']);
    $router->delete('delete/{id}', [ProdukController::class, 'destroy']);
});
$router->group(['prefix' => 'kategori-produk'], function () use ($router) {
    $router->get('all', [KategoriProdukController::class, 'index']);
    $router->get('detail/{id}', [KategoriProdukController::class, 'show']);
    $router->get('edit/{id}', [KategoriProdukController::class, 'edit']);
    $router->get('create', [KategoriProdukController::class, 'create']);
    $router->post('baru', [KategoriProdukController::class, 'store']);
    $router->post('update', [KategoriProdukController::class, 'update']);
    $router->delete('delete/{id}', [KategoriProdukController::class, 'destroy']);
});
$router->group(['prefix' => 'SatuanProduk'], function () use ($router) {
    $router->get('all', [SatuanProdukController::class, 'index']);
    $router->get('detail/{id}', [SatuanProdukController::class, 'show']);
    $router->get('edit/{id}', [SatuanProdukController::class, 'edit']);
    $router->get('create', [SatuanProdukController::class, 'create']);
    $router->post('baru', [SatuanProdukController::class, 'store']);
    $router->post('update', [SatuanProdukController::class, 'update']);
    $router->delete('delete/{id}', [SatuanProdukController::class, 'destroy']);
});

$router->group(['prefix' => 'transaksi'], function () use ($router) {
    $router->get('all', [TransaksiController::class, 'index']);
    $router->get('detail/{id}', [TransaksiController::class, 'show']);
    $router->get('edit/{id}', [TransaksiController::class, 'edit']);
    $router->get('create', [TransaksiController::class, 'create']);
    $router->post('baru', [TransaksiController::class, 'store']);
    $router->post('update', [TransaksiController::class, 'update']);
    $router->delete('delete/{id}', [TransaksiController::class, 'destroy']);
});

$router->group(['prefix' => 'keuangan'], function () use ($router) {
    $router->get('all', [KeuanganController::class, 'index']);
    $router->get('detail/{id}', [KeuanganController::class, 'show']);
    $router->get('edit/{id}', [KeuanganController::class, 'edit']);
    $router->get('create', [KeuanganController::class, 'create']);
    $router->post('baru', [KeuanganController::class, 'store']);
    $router->post('update', [KeuanganController::class, 'update']);
    $router->delete('delete/{id}', [KeuanganController::class, 'destroy']);
});

$router->group(['prefix' => 'pelanggan'], function () use ($router) {
    $router->get('all', [PelangganController::class, 'index']);
    $router->get('detail/{id}', [PelangganController::class, 'show']);
    $router->get('edit/{id}', [PelangganController::class, 'edit']);
    $router->get('create', [PelangganController::class, 'create']);
    $router->post('baru', [PelangganController::class, 'store']);
    $router->post('update', [PelangganController::class, 'update']);
    $router->delete('delete/{id}', [PelangganController::class, 'destroy']);
});

$router->group(['prefix' => 'detail_transaksi'], function () use ($router) {
    $router->get('all', [DetailTransaksiController::class, 'index']);
    $router->get('detail/{id}', [DetailTransaksiController::class, 'show']);
    $router->get('edit/{id}', [DetailTransaksiController::class, 'edit']);
    $router->get('create', [DetailTransaksiController::class, 'create']);
    $router->post('baru', [DetailTransaksiController::class, 'store']);
    $router->post('update', [DetailTransaksiController::class, 'update']);
    $router->delete('delete/{id}', [DetailTransaksiController::class, 'destroy']);
});

$router->group(['prefix' => 'komisi'], function () use ($router) {
    $router->get('all', [KomisiController::class, 'index']);
    $router->get('detail/{id}', [KomisiController::class, 'show']);
    $router->get('edit/{id}', [KomisiController::class, 'edit']);
    $router->get('create', [KomisiController::class, 'create']);
    $router->post('baru', [KomisiController::class, 'store']);
    $router->post('update', [KomisiController::class, 'update']);
    $router->delete('delete/{id}', [KomisiController::class, 'destroy']);
});

$router->group(['prefix' => 'detail_cuci'], function () use ($router) {
    $router->get('all', [DetailCuciController::class, 'index']);
    $router->get('detail/{id}', [DetailCuciController::class, 'show']);
    $router->get('edit/{id}', [DetailCuciController::class, 'edit']);
    $router->get('create', [DetailCuciController::class, 'create']);
    $router->post('baru', [DetailCuciController::class, 'store']);
    $router->post('update', [DetailCuciController::class, 'update']);
    $router->delete('delete/{id}', [DetailCuciController::class, 'destroy']);
});

$router->group(['prefix' => 'kendaraan'], function () use ($router) {
    $router->get('all', [KendaraanController::class, 'index']);
    $router->get('detail/{id}', [KendaraanController::class, 'show']);
    $router->get('edit/{id}', [KendaraanController::class, 'edit']);
    $router->get('create', [KendaraanController::class, 'create']);
    $router->post('baru', [KendaraanController::class, 'store']);
    $router->post('update', [KendaraanController::class, 'update']);
    $router->delete('delete/{id}', [KendaraanController::class, 'destroy']);
});



$router->group(['prefix' => 'voucher'], function () use ($router) {
    $router->get('all', [VoucherController::class, 'index']);
    $router->get('detail/{id}', [VoucherController::class, 'show']);
    $router->get('edit/{id}', [VoucherController::class, 'edit']);
    $router->get('create', [VoucherController::class, 'create']);
    $router->post('baru', [VoucherController::class, 'store']);
    $router->post('update', [VoucherController::class, 'update']);
    $router->delete('delete/{id}', [VoucherController::class, 'destroy']);
});

$router->group(['prefix' => 'kasbon'], function () use ($router) {
    $router->get('all', [KasbonController::class, 'index']);
    $router->get('detail/{id}', [KasbonController::class, 'show']);
    $router->get('edit/{id}', [KasbonController::class, 'edit']);
    $router->get('create', [KasbonController::class, 'create']);
    $router->post('baru', [KasbonController::class, 'store']);
    $router->post('update', [KasbonController::class, 'update']);
    $router->delete('delete/{id}', [KasbonController::class, 'destroy']);
});
$router->group(['prefix' => 'bisnis'], function () use ($router) {
    $router->get('all', [BisnisController::class, 'index']);
    $router->get('detail/{id}', [BisnisController::class, 'show']);
    $router->get('edit/{id}', [BisnisController::class, 'edit']);
    $router->get('create', [BisnisController::class, 'create']);
    $router->post('baru', [BisnisController::class, 'store']);
    $router->post('update', [BisnisController::class, 'update']);
    $router->delete('delete/{id}', [BisnisController::class, 'destroy']);
});
#next_route
