<?php

namespace Database\Seeders;

use App\Models\satuan_produk;
use Illuminate\Database\Seeder;

class SatuanProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $satuan_produk_collection = [
            ['id_satuan_produk' => 'SP01', 'nama_satuan'=>'Kopi'],
            ['id_satuan_produk' => 'SP02', 'nama_satuan'=>'Teh']
        ];



        foreach ($satuan_produk_collection as $item){
            satuan_produk::create($item);
        }
    }
}
