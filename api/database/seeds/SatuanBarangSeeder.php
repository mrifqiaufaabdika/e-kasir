<?php

namespace Database\Seeders;

use App\Models\satuan_barang;
use Illuminate\Database\Seeder;

class SatuanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $satuan_barang_collection = [
          ['id' => 'SB01', 'nama_satuan'=>'Meja'],
          ['id' => 'SB02', 'nama_satuan'=>'Alat Tulis']
        ];
        foreach ($satuan_barang_collection as $item){
            satuan_barang::create($item);
        }
    }
}