<?php

namespace Database\Seeders;

use App\Models\kategori_produk;
use Illuminate\Database\Seeder;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_produk_collection = [
            ['id_kategori_produk'=>'KP01','nama_kategori_produk'=>'Kopi Aceh Gayo','id_satuan_produk'=>'K01'],
            ['id_kategori_produk'=>'KP02','nama_kategori_produk'=>'Kopi Ule Kareng Robusta','id_satuan_produk'=>'K01']
        ];
        foreach($kategori_produk_collection as $item){
            kategori_produk::create($item);
        }
    }
}
