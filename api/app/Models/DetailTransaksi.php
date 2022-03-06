<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id_detail_faktur
 * @property integer $nomor_faktur
 * @property string $id_produk
 * @property int $bisnis
 * @property float $harga
 * @property float $qty
 * @property float $potongan
 * @property float $total
 * @property string $catatan
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class DetailTransaksi extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detail_transaksi';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['nomor_faktur', 'id_produk', 'bisnis', 'harga', 'qty', 'potongan', 'total', 'catatan', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['nomor_faktur', 'id_produk', 'bisnis', 'harga', 'qty', 'potongan', 'total', 'catatan', 'status', 'created_at', 'updated_at'];

}
