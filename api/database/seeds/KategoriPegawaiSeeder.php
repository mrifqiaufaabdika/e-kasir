<?php

namespace Database\Seeders;

use App\Models\kategori_pegawai;
use Illuminate\Database\Seeder;

class KategoriPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kategori_pegawai_collection = [
            ['id'=>'KP01','nama_kategori' => 'Super Admin'],
            ['id'=>'KP02','nama_kategori' => 'Pimpinan'],
            ['id'=>'KP03','nama_kategori' => 'Supervisior'],
            ['id'=>'KP04','nama_kategori' => 'Barista'],
            ['id'=>'KP05','nama_kategori' => 'Kasir'],
            ['id'=>'KP06','nama_kategori' => 'Mandor'],
            ['id'=>'KP07','nama_kategori' => 'Pencuci'],


        ];
        foreach ($kategori_pegawai_collection as $item) {
            kategori_pegawai::create($item);
        }
    }
}
