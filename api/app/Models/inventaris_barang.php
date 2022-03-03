<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id_invetaris_barang
 * @property string $id_barang
 * @property string $id_pencatat
 * @property string $jumlah
 * @property string $jenis_inventaris
 * @property string $keterangan
 * @property string $created_at
 * @property string $updated_at
 */
class inventaris_barang extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inventaris_barang';
    protected $primaryKey = 'id';
    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_inventaris_barang','id_barang','id_pencatat','jumlah','jenis_inventaris','keterangan', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['id_inventaris_barang','id_barang','id_pencatat','jumlah','jenis_inventaris','keterangan', 'created_at', 'updated_at'];

    /*public $appends = [
        'satuan_barang'
    ];

    public function getSatuanBarangAttribute(){
        return $this->belongsTo(satuan_barang::class,
        'id_satuan',
            'id')->first();
    }*/
}
