<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id
 * @property integer $id_pramudi
 * @property integer $id_bus
 * @property integer $id_rute
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 * @property string $koordinat
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Perjalanan extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'perjalanan';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['id_pramudi', 'id_bus', 'id_rute', 'waktu_mulai', 'waktu_selesai', 'koordinat', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['id_pramudi', 'id_bus', 'id_rute', 'waktu_mulai', 'waktu_selesai', 'koordinat', 'status', 'created_at', 'updated_at'];

}
