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
            ['id_kategori_produk'=>'KP01','nama_kategori_produk'=>'Kopi Aceh Gayo'],
            ['id_kategori_produk'=>'KP02','nama_kategori_produk'=>'Kopi Ule Kareng Robusta'],



            ['id_kategori_produk'=>'KP03','nama_kategori_produk'=>'Cucian Mobil'],
            ['id_kategori_produk'=>'KP04','nama_kategori_produk'=>'Cucian Karpet'],
            ['id_kategori_produk'=>'KP05','nama_kategori_produk'=>'Salon Mobil'],
            ['id_kategori_produk'=>'KP06','nama_kategori_produk'=>'Coating'],
        ];
        foreach($kategori_produk_collection as $item){
            kategori_produk::create($item);
        }
    }
}
