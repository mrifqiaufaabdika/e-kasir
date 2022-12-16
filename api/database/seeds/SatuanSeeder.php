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
            ['id'=>'19','nama_satuan'=>'Batang','satuan_code'=>'Btg'],
            ['id'=>'18','nama_satuan'=>'Boks','satuan_code'=>'Boks'],
            ['id'=>'14','nama_satuan'=>'Botol','satuan_code'=>'Btl'],
            ['id'=>'21','nama_satuan'=>'Buah','satuan_code'=>'Buah'],
            ['id'=>'20','nama_satuan'=>'Butir','satuan_code'=>'Btr'],
            ['id'=>'26','nama_satuan'=>'Centimeter','satuan_code'=>'cm'],
            ['id'=>'10','nama_satuan'=>'Centimeter Cubic','satuan_code'=>'cc'],
            ['id'=>'12','nama_satuan'=>'Cup','satuan_code'=>'Cup'],
            ['id'=>'35','nama_satuan'=>'Dus','satuan_code'=>'Dus'],
            ['id'=>'34','nama_satuan'=>'Ekor ','satuan_code'=>'Ekr'],
            ['id'=>'17','nama_satuan'=>'Galon','satuan_code'=>'Gln'],
            ['id'=>'2','nama_satuan'=>'Gelas','satuan_code'=>'Gls'],
            ['id'=>'6','nama_satuan'=>'Gram','satuan_code'=>'gr'],
            ['id'=>'32','nama_satuan'=>'Kapsul','satuan_code'=>'Kpsl'],
            ['id'=>'16','nama_satuan'=>'Karton','satuan_code'=>'Kart'],
            ['id'=>'36','nama_satuan'=>'Karung','satuan_code'=>'Krng'],
            ['id'=>'5','nama_satuan'=>'Kilogram','satuan_code'=>'Kg'],
            ['id'=>'13','nama_satuan'=>'Klg','satuan_code'=>'Can'],
            ['id'=>'22','nama_satuan'=>'Kotak','satuan_code'=>'Ktk'],
            ['id'=>'99','nama_satuan'=>'Lainnya','satuan_code'=>'Lain'],
            ['id'=>'38','nama_satuan'=>'Lembar','satuan_code'=>'Lbr'],
            ['id'=>'9','nama_satuan'=>'Liter','satuan_code'=>'Ltr'],
            ['id'=>'27','nama_satuan'=>'Meter','satuan_code'=>'m'],
            ['id'=>'7','nama_satuan'=>'Miligram','satuan_code'=>'mg'],
            ['id'=>'8','nama_satuan'=>'Mililiter','satuan_code'=>'ml'],
            ['id'=>'11','nama_satuan'=>'Ounce','satuan_code'=>'Oz'],
            ['id'=>'23','nama_satuan'=>'Pack','satuan_code'=>'Pack'],
            ['id'=>'15','nama_satuan'=>'Paket','satuan_code'=>'Pak'],
            ['id'=>'3','nama_satuan'=>'Pieces','satuan_code'=>'Pcs'],
            ['id'=>'1','nama_satuan'=>'Porsi','satuan_code'=>'Prs'],
            ['id'=>'33','nama_satuan'=>'Pot','satuan_code'=>'pot'],
            ['id'=>'24','nama_satuan'=>'Roll','satuan_code'=>'Roll'],
            ['id'=>'4','nama_satuan'=>'Sachet','satuan_code'=>'Sch'],
            ['id'=>'30','nama_satuan'=>'Strip','satuan_code'=>'Strip'],
            ['id'=>'29','nama_satuan'=>'Tablet','satuan_code'=>'Tblt'],
            ['id'=>'37','nama_satuan'=>'Ton','satuan_code'=>'Ton'],
            ['id'=>'31','nama_satuan'=>'Tube','satuan_code'=>'Tube'],
            ['id'=>'25','nama_satuan'=>'Unit','satuan_code'=>'unit'],
            ['id'=>'28','nama_satuan'=>'Yard','satuan_code'=>'yd']
        ];



        foreach ($satuan_barang_collection as $item){
            Satuan::create($item);
        }
    }
}
