<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $no_bukti_kas
 * @property integer $pencatat
 * @property int $bisnis
 * @property string $jenis
 * @property float $total
 * @property string $keterangan
 * @property float $saldo
 * @property string $created_at
 * @property string $updated_at
 */
class Keuangan extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'keuangan';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['pencatat', 'bisnis', 'jenis', 'total', 'keterangan', 'saldo', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['pencatat', 'bisnis', 'jenis', 'total', 'keterangan', 'saldo', 'created_at', 'updated_at'];

}
