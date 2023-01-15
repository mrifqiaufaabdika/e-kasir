<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id_member
 * @property string $nama
 * @property string $nomor_hp
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property int $jumlah_transaksi
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Pelanggan extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pelanggan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'nomor_hp', 'jenis_kelamin', 'alamat', 'jumlah_transaksi', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['nama', 'nomor_hp', 'jenis_kelamin', 'alamat', 'jumlah_transaksi', 'status', 'created_at', 'updated_at'];

}
