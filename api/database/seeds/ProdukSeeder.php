<?php

namespace Database\Seeders;

use App\Models\barang;
use App\Models\Produk;
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
            ['id'=>'P01','nama_produk'=>'Hot Coffe Milk', 'id_kategori_produk'=>'KP01', 'harga'=>'20000','kesediaan'=>'tersedia','satuan'=>'S05','deskripsi'=>'Kopi nikmat 120 cc','status'=>'Aktif','stok'=>'120','foto'=>null,'type_bisnis'=>'2'],
            ['id'=>'P02','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'S05','deskripsi'=>'Kopi nikmat 120 cc','status'=>'Aktif','stok'=>'100','foto'=>null,'type_bisnis'=>'2'],


            ['id'=>'P03','nama_produk'=>'Cucian Mobil Kecil', 'id_kategori_produk'=>'KP03', 'harga'=>'45000','kesediaan'=>'tersedia','satuan'=>'S05','deskripsi'=>'Cuci Salju Mobil Kecil','status'=>'Aktif','stok'=>'100','foto'=>null,'type_bisnis'=>'1'],
            ['id'=>'P04','nama_produk'=>'Cucian Mobil Besar', 'id_kategori_produk'=>'KP03', 'harga'=>'50000','kesediaan'=>'tersedia','satuan'=>'S05','deskripsi'=>'Cuci Salju Mobil Besar','status'=>'Aktif','stok'=>'100','foto'=>null,'type_bisnis'=>'1'],
//            ['id_produk'=>'P05','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P06','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P07','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P08','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P09','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P10','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P11','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P12','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P13','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P14','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P15','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P16','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P17','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P18','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P19','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],
//            ['id_produk'=>'P20','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP01', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'SB01','deskripsi'=>'Kopi nikmat 120 cc','status'=>'aktif','stok'=>'100','type_bisnis'=>'coffeshop'],


        ];
        foreach($produk_collection as $item){
            Produk::create($item);
        }
    }
}
