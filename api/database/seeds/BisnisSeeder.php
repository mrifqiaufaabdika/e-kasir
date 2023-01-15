<?php

namespace Database\Seeders;

use App\Models\Bisnis;
use Illuminate\Database\Seeder;

class BisnisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bisnis_coll = [
            ['nama'=>'Tanara','saldo'=>'0','keterangan'=>'Usaha Pencucian dan Salon Mobil','alamat'=>'Kulim','nomor_hp'=>'08xxxxxx','website'=>'www.moulaatanara.com'],
            ['nama'=>'Muolaa','saldo'=>'0','keterangan'=>'Usaha Cafe Penyedia Kopi, Minuman dan Disert','alamat'=>'Kulim','nomor_hp'=>'08xxxxxx','website'=>'www.moulaatanara.com'],
        ];
        foreach($bisnis_coll as $item){
            Bisnis::create($item);
        }

    }
}
