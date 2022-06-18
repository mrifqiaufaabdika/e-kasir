<?php

namespace Database\Seeders;

use App\Models\Base\KeyGen;
use App\Models\Base\Role;
use App\Models\Base\User;
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

            ['nip'=>'2022014313','nik' => '140404201096002','nama' => 'Muhammad Rifqi','jenis_kelamin' => 'pria','tempat_lahir' => 'pekanbaru','telepon' => '081268475430','agama' => 'Islam',
                'status_nikah' =>'menikah', 'alamat'=>'Jl. Nangka', 'email' => 'muhammadrifqi@gamil.com','id_kategori_pegawai'=>'KP05','gaji_pokok'=>'4000000','tanggal_lahir' =>'1996-12-03','tanggal_terima' =>'2021-12-03','tanggal_keluar' =>null,'foto'=>'profile.png','status'=>'aktif'],

            ['nip'=>'2022014314','nik' => '140404201096002','nama' => 'Tri','jenis_kelamin' => 'pria','tempat_lahir' => 'pekanbaru','telepon' => '081314721408','agama' => 'Islam',
                'status_nikah' =>'menikah', 'alamat'=>'Jl. Nangka', 'email' => 'tri@gamil.com','id_kategori_pegawai'=>'KP05','gaji_pokok'=>'4000000','tanggal_lahir' =>'1996-12-03','tanggal_terima' =>'2021-12-03','tanggal_keluar' =>null,'foto'=>'profile.png','status'=>'aktif'],

            ['nip'=>'2022014315','nik' => '140404201096003','nama' => 'Aufa','jenis_kelamin' => 'pria','tempat_lahir' => 'pekanbaru','telepon' => '0812000000','agama' => 'Islam',
                'status_nikah' =>'menikah', 'alamat'=>'Jl. Nangka', 'email' => 'aufa@gamil.com','id_kategori_pegawai'=>'KP06','gaji_pokok'=>'5000000','tanggal_lahir' =>'1996-12-03','tanggal_terima' =>'2021-12-03','tanggal_keluar' =>null,'foto'=>'profile.png','status'=>'aktif'],


            ['nip'=>'2022014316','nik' => '140404201096003','nama' => 'Abdika','jenis_kelamin' => 'pria','tempat_lahir' => 'pekanbaru','telepon' => '0812000000','agama' => 'Islam',
                'status_nikah' =>'menikah', 'alamat'=>'Jl. Nangka', 'email' => 'abdika@gamil.com','id_kategori_pegawai'=>'KP07','gaji_pokok'=>'0','tanggal_lahir' =>'1996-12-03','tanggal_terima' =>'2021-12-03','tanggal_keluar' =>null,'foto'=>'profile.png','status'=>'aktif'],

            ['nip'=>'2022014317','nik' => '140404201096004','nama' => 'Mueri Sandes','jenis_kelamin' => 'pria','tempat_lahir' => 'pekanbaru','telepon' => '0812000000','agama' => 'Islam',
                'status_nikah' =>'menikah', 'alamat'=>'Jl. Nangka', 'email' => 'muerisandes@gamil.com','id_kategori_pegawai'=>'KP07','gaji_pokok'=>'0','tanggal_lahir' =>'1996-12-03','tanggal_terima' =>'2021-12-03','tanggal_keluar' =>null,'foto'=>'profile.png','status'=>'aktif'],

        ];
        foreach ($pegawai_collection as $item) {
            pegawai::create($item);
        }


        $kasir =  Role::where('name','=','Kasir')->first();

        $create_user = User::create([
            'id' => KeyGen::randomKey(),
            'nip' => '2022014313',
            'name'=>'Muhammad Rifqi',
            'email' => 'muhammadrifqi@gamil.com',
            'password' => password_hash('adm@123', PASSWORD_BCRYPT)
        ]);

        $user = User::where('email', 'muhammadrifqi@gamil.com')->first();
        $user->assignRole([$kasir->id]);

        $create_user = User::create([
            'id' => KeyGen::randomKey(),
            'nip' => '2022014314',
            'name'=>'Tri',
            'email' => 'tri@gamil.com',
            'password' => password_hash('adm@123', PASSWORD_BCRYPT)
        ]);

        $user = User::where('email', 'tri@gamil.com')->first();
        $user->assignRole([$kasir->id]);
    }
}
