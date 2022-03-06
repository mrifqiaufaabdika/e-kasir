<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id
 * @property string $nama
 * @property float $saldo
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 */
class Bisnis extends SelfModel
{
    use Searchable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['nama', 'saldo', 'keterangan', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['nama', 'saldo', 'keterangan', 'created_at', 'updated_at'];

}
