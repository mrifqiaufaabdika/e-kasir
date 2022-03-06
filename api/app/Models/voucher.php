<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id_voucher
 * @property string $nama_voucher
 * @property string $kode_voucher
 * @property string $potongan
 * @property string $masa_berlaku
 * @property string $kuota
 * @property string $digunakan_oleh
 * @property string $updated_at
 */
class voucher extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'voucher';
    protected $primaryKey = 'id_voucher';
    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_voucher','nama_voucher','kode_voucher','potongan','masa_berlaku','kuota','digunakan_oleh','created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['id_voucher','nama_voucher','kode_voucher','potongan','masa_berlaku','kuota','digunakan_oleh','created_at', 'updated_at'];

  /*  public $appends = [
        'satuan_barang'
    ];

    public function getSatuanBarangAttribute(){
        return $this->belongsTo(satuan_barang::class,
        'id_satuan',
            'id')->first();
    }*/
}
