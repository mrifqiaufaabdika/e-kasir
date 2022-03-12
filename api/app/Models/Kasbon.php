<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $nomor_faktur
 * @property integer $pencatat
 * @property integer $peminjam
 * @property float $total
 * @property string $Status
 * @property string $tempo
 * @property string $riyawat_bayar
 * @property string $created_at
 * @property string $updated_at
 */
class Kasbon extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'kasbon';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['pencatat', 'peminjam', 'total', 'Status', 'tempo', 'riyawat_bayar', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['pencatat', 'peminjam', 'total', 'Status', 'tempo', 'riyawat_bayar', 'created_at', 'updated_at'];

}
