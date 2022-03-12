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
            ['nama'=>'Car Wash','saldo'=>'0','keterangan'=>'Usaha Pencucian dan Salon Mobil'],
            ['nama'=>'Coffe Shop','saldo'=>'0','keterangan'=>'Usaha Cafe Penyedia Kopi, Minuman dan Disert'],
        ];
        foreach($bisnis_coll as $item){
            Bisnis::create($item);
        }

    }
}
