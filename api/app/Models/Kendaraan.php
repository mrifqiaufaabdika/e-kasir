<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id_kendaraan
 * @property string $nomor_polisi
 * @property string $merek_kendaraan
 * @property string $created_at
 * @property string $updated_at
 */
class Kendaraan extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kendaraan';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['id_kendaraan', 'nomor_polisi', 'merek_kendaraan', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['id_kendaraan', 'nomor_polisi', 'merek_kendaraan', 'created_at', 'updated_at'];

}
