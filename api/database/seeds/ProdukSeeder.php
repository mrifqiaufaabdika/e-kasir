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
            ['id'=>'P01','nama_produk'=>'Hot Coffe Milk', 'id_kategori_produk'=>'KP05', 'harga'=>'20000','kesediaan'=>'tersedia','satuan'=>'12','deskripsi'=>'Kopi nikmat 120 cc','status'=>'Aktif','stok'=>'120','foto'=>null,'type_bisnis'=>'2','detail_kendaraan'=>'0'],
            ['id'=>'P02','nama_produk'=>'Hot Coffe Latte', 'id_kategori_produk'=>'KP05', 'harga'=>'25000','kesediaan'=>'tersedia','satuan'=>'12','deskripsi'=>'Kopi nikmat 120 cc','status'=>'Aktif','stok'=>'100','foto'=>null,'type_bisnis'=>'2'],


            ['id'=>'P03','nama_produk'=>'Cucian Mobil Kecil', 'id_kategori_produk'=>'KP01', 'harga'=>'45000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Cuci Salju Mobil Kecil','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P04','nama_produk'=>'Cucian Mobil Besar', 'id_kategori_produk'=>'KP01', 'harga'=>'50000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Cuci Salju Mobil Besar','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],

            ['id'=>'P05','nama_produk'=>'Karpet kecil 1', 'id_kategori_produk'=>'KP02', 'harga'=>'30000','kesediaan'=>'tersedia','satuan'=>'38','deskripsi'=>'Cuci Karpet Kecil','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P06','nama_produk'=>'Karpet kecil 2', 'id_kategori_produk'=>'KP02', 'harga'=>'35000','kesediaan'=>'tersedia','satuan'=>'38','deskripsi'=>'Cuci Karpet Kecil','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P07','nama_produk'=>'Karpet kecil 3', 'id_kategori_produk'=>'KP02', 'harga'=>'40000','kesediaan'=>'tersedia','satuan'=>'38','deskripsi'=>'Cuci Karpet Kecil','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],

            ['id'=>'P08','nama_produk'=>'Karpet Menengah 1', 'id_kategori_produk'=>'KP02', 'harga'=>'60000','kesediaan'=>'tersedia','satuan'=>'38','deskripsi'=>'Cuci Karpet Menengah','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P09','nama_produk'=>'Karpet Menengah 2', 'id_kategori_produk'=>'KP02', 'harga'=>'60000','kesediaan'=>'tersedia','satuan'=>'38','deskripsi'=>'Cuci Karpet Menengah','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],

            ['id'=>'P10','nama_produk'=>'Karpet Besar 1', 'id_kategori_produk'=>'KP02', 'harga'=>'80000','kesediaan'=>'tersedia','satuan'=>'38','deskripsi'=>'Cuci Karpet Besar','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P11','nama_produk'=>'Karpet Besar 2', 'id_kategori_produk'=>'KP02', 'harga'=>'90000','kesediaan'=>'tersedia','satuan'=>'38','deskripsi'=>'Cuci Karpet Besar','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],

            ['id'=>'P12','nama_produk'=>'Karpet Mesjid', 'id_kategori_produk'=>'KP02', 'harga'=>'90000','kesediaan'=>'tersedia','satuan'=>'27','deskripsi'=>'Cuci Karpet Mesjid','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],

            ['id'=>'P13','nama_produk'=>'Salon Mobil Kecil (full)', 'id_kategori_produk'=>'KP03', 'harga'=>'600000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Salon mobil kecil full','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P14','nama_produk'=>'Salon Mobil Kecil (body)', 'id_kategori_produk'=>'KP03', 'harga'=>'300000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Salon mobil kecil body','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P15','nama_produk'=>'Salon Mobil Besar (full)', 'id_kategori_produk'=>'KP03', 'harga'=>'750000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Salon mobil besar full','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P16','nama_produk'=>'Salon Mobil Kecil (budy)', 'id_kategori_produk'=>'KP03', 'harga'=>'350000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Salon mobil besar body','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P17','nama_produk'=>'Salon Kaca', 'id_kategori_produk'=>'KP03', 'harga'=>'150000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Salon kaca mobil','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],

            ['id'=>'P18','nama_produk'=>'Coating Mobil Kecil', 'id_kategori_produk'=>'KP04', 'harga'=>'3000000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Coating mobil kecil','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P19','nama_produk'=>'Coating Mobil Besar', 'id_kategori_produk'=>'KP04', 'harga'=>'4500000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Coating mobil kecil','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
            ['id'=>'P20','nama_produk'=>'Coating Lampu', 'id_kategori_produk'=>'KP04', 'harga'=>'300000','kesediaan'=>'tersedia','satuan'=>'25','deskripsi'=>'Coating mobil kecil','status'=>'Aktif','stok'=>'0','foto'=>null,'type_bisnis'=>'1','detail_kendaraan'=>'1'],
//
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
