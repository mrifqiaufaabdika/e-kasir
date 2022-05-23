<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id
 * @property int $id_pegawai
 * @property string $tanggal
 * @property string $keterangan
 * @property float $jumlah_gaji_pokok
 * @property float $jumlah_gaji_upah
 * @property float $jumlah_gaji_bonus
 * @property float $potongan
 * @property float $total
 * @property string $created_at
 * @property string $updated_at
 */
class Penggajian extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penggajian';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_pegawai', 'tanggal', 'keterangan', 'jumlah_gaji_pokok', 'jumlah_gaji_upah', 'jumlah_gaji_bonus', 'potongan', 'total', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['id_pegawai', 'tanggal', 'keterangan', 'jumlah_gaji_pokok', 'jumlah_gaji_upah', 'jumlah_gaji_bonus', 'potongan', 'total', 'created_at', 'updated_at'];

}
