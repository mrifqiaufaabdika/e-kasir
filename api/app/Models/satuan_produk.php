<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id_satuan_produk
 * @property string $nama_satuan_produk
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
    protected $primaryKey = 'id_satuan_produk';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_satuan_produk','nama_satuan_produk', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['id_satuan_produk','nama_satuan_produk', 'created_at', 'updated_at'];

}
