<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $nomor_faktur
 * @property integer $kasir
 * @property integer $member
 * @property string $nama
 * @property string $nomor_hp
 * @property string $jenis_kelamin
 * @property float $total
 * @property float $bayar
 * @property float $kembalian
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Transaksi extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'transaksi';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['kasir', 'member', 'nama', 'nomor_hp', 'jenis_kelamin', 'total', 'bayar', 'kembalian', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['kasir', 'member', 'nama', 'nomor_hp', 'jenis_kelamin', 'total', 'bayar', 'kembalian', 'status', 'created_at', 'updated_at'];

}
