<?php

namespace Database\Seeders;

use App\Models\pajak;
use Illuminate\Database\Seeder;

class PajakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pajak_collection =
            ['id'=>1,'pajak'=> 12, 'aktif'=>0]
        ;
        pajak::create($pajak_collection);
    }
}
