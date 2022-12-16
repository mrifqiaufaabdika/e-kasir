<?php

namespace Database\Seeders;

use App\Models\barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $barang_collection = [
            ['id_barang'=>'B01','nama_barang'=>'Meja Ikea', 'id_satuan'=>'25'],
            ['id_barang'=>'B02','nama_barang'=>'Meja Kasir', 'id_satuan'=>'25'],
        ];
        foreach($barang_collection as $item){
            barang::create($item);
        }
    }
}
