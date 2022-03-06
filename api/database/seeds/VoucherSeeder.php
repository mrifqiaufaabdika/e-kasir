<?php

namespace Database\Seeders;

use App\Models\produk;
use App\Models\voucher;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $voucher_collection = [
        ['id_voucher'=>'V01','nama_voucher'=>'Musim Hujan','kode_voucher'=>'HUJAN5000','potongan'=>'5000','masa_berlaku'=>'23-05-2022','kuota'=>'100','digunakan_oleh'=>'null'],
        ['id_voucher'=>'V02','nama_voucher'=>'Tahun Baru','kode_voucher'=>'THB5000','potongan'=>'5000','masa_berlaku'=>'23-05-2022','kuota'=>'100','digunakan_oleh'=>'null']
        ];

        foreach($voucher_collection as $item){
            voucher::create($item);
        }
    }
}
