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
            ['nama_barang'=>'Meja Ikea', 'id_satuan'=>'SB01'],
            ['nama_barang'=>'Meja Kasir', 'id_satuan'=>'SB01'],
        ];
        foreach($barang_collection as $item){
            barang::create($item);
        }
    }
}
