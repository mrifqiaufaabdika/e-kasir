<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id
 * @property string $nomor_polisi
 * @property string $merek
 * @property integer $jumlah_roda
 * @property string $warna
 * @property integer $kapasitas_duduk
 * @property integer $kapasitas_berdiri
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Bus extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'bus';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['nomor_polisi', 'merek', 'jumlah_roda', 'warna', 'kapasitas_duduk', 'kapasitas_berdiri', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['nomor_polisi', 'merek', 'jumlah_roda', 'warna', 'kapasitas_duduk', 'kapasitas_berdiri', 'status', 'created_at', 'updated_at'];

}
