<?php

namespace Database\Seeders;

use App\Models\inventaris_barang;
use Illuminate\Database\Seeder;

class InvetarisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $inventaris_barang_collection = [
          ['id_inventaris_barang'=>'IB01','id_barang'=>'B01','id_pencatat'=>'2022014312','jumlah'=>'10','jenis_inventaris'=>'Masuk','keterangan'=>'sukses'],
          ['id_inventaris_barang'=>'IB02','id_barang'=>'B02','id_pencatat'=>'2022014312','jumlah'=>'12','jenis_inventaris'=>'Keluar','keterangan'=>'sukses']
        ];
        foreach($inventaris_barang_collection as $item){
            inventaris_barang::create($item);
        }

    }
}
