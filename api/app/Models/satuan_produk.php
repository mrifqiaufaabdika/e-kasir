<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id
 * @property string $nama_satuan
 * @property string $created_at
 * @property string $updated_at
 */
class satuan_produk extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'satuan_produk';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['nama_satuan', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['nama_satuan', 'created_at', 'updated_at'];

}
