<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
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
          ['id' => 'S01', 'nama_satuan'=>'Meja'],
          ['id' => 'S02', 'nama_satuan'=>'Alat Tulis'],
            ['id' => 'S03', 'nama_satuan'=>'Kopi'],
            ['id' => 'S04', 'nama_satuan'=>'Teh'],


            ['id' => 'S05', 'nama_satuan'=>'Unit'],
            ['id' => 'S06', 'nama_satuan'=>'Meter'],
            ['id' => 'S07', 'nama_satuan'=>'Lembar'],
        ];



        foreach ($satuan_barang_collection as $item){
            Satuan::create($item);
        }
    }
}
