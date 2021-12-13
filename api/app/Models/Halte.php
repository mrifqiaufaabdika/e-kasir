<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id
 * @property string $nama_halte
 * @property string $alamat
 * @property string $koordinat
 * @property string $tipe
 * @property string $transit
 * @property string $rute_singgah
 * @property integer $kapasitas
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Halte extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'halte';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['nama_halte', 'alamat', 'koordinat', 'tipe', 'transit', 'rute_singgah', 'kapasitas', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['nama_halte', 'alamat', 'koordinat', 'tipe', 'transit', 'rute_singgah', 'kapasitas', 'status', 'created_at', 'updated_at'];

}
