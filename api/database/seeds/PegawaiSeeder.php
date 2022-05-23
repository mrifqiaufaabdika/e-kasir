<?php

namespace Database\Seeders;

use App\Models\pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
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
        $pegawai_collection = [
            ['nip'=>'2022014312','nik' => '140404201096001','nama' => 'Masykur Tarmizi','jenis_kelamin' => 'pria','tempat_lahir' => 'pekanbaru','telepon' => '0812000000','agama' => 'Islam',
                'status_nikah' =>'menikah', 'alamat'=>'Jl. Nangka', 'email' => 'masykur@gamil.com','id_kategori_pegawai'=>'KP02','gaji_pokok'=>'5000000','tanggal_lahir' =>'1996-12-03','tanggal_terima' =>'2021-12-03','tanggal_keluar' =>null,'foto'=>'profile.png','status'=>'aktif'],


        ];
        foreach ($pegawai_collection as $item) {
            pegawai::create($item);
        }
    }
}
