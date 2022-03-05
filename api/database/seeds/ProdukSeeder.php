<?php

namespace Database\Seeders;

use App\Models\barang;
use App\Models\produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $produk_collection = [
            ['id_produk'=>'P01','nama_produk'=>'Hot Coffe Milk', 'id_kategori_produk'=>'KP01', 'harga'=>'20000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'120','type_bisnis'=>'coffeshop'],
            ['id_produk'=>'P02','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop']
        ];
        foreach($produk_collection as $item){
            produk::create($item);
        }
    }
}
