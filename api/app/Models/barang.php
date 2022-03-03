<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id_barang
 * @property string $nama_barang
 * @property int $id_satuan
 * @property string $created_at
 * @property string $updated_at
 */
class barang extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barang';
    protected $primary_key = 'id_barang';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_barang','nama_barang','id_satuan', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['id_barang','nama_barang','id_satuan','created_at', 'updated_at'];

    public $appends = [
        'satuan_barang'
    ];

    public function getSatuanBarangAttribute(){
        return $this->belongsTo(satuan_barang::class,
        'id_satuan',
            'id')->first();
    }
}
