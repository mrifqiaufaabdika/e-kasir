<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id_kategori_produk
 * @property string $nama_kategori
 * @property int $id_satuan_produk
 * @property string $created_at
 * @property string $updated_at
 */
class kategori_produk extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kategori_produk';
    protected $primaryKey = 'id_kategori_produk';
    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_kategori_produk','nama_kategori', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['id_kategori_produk','nama_kategori', 'created_at', 'updated_at'];


    public $appends = [
        'jumlah_produk',

    ];

    public function getJumlahProdukAttribute(){
        return $this->hasMany(Produk::class,'id_kategori_produk','id_kategori_produk')->get()->count();
    }


}
