<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id
 * @property string $kode_rute
 * @property string $nama_rute
 * @property integer $id_halte_awal
 * @property integer $id_halte_akhir
 * @property string $jalur
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Rute extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rute';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['kode_rute', 'nama_rute', 'id_halte_awal', 'id_halte_akhir', 'jalur', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['kode_rute', 'nama_rute', 'id_halte_awal', 'id_halte_akhir', 'jalur', 'status', 'created_at', 'updated_at'];

}
