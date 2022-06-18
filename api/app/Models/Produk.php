<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property string $id
 * @property string $nama_produk
 * @property string $id_kategori_produk
 * @property string $harga
 * @property string $kesediaan
 * @property string $satuan
 * @property string $deskripsi
 * @property string $status
 * @property string $stok
 * @property string $type_bisnis
 * @property string $created_at
 * @property string $updated_at
 */
class Produk extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produk';
    protected $primaryKey = 'id';
    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nama_produk','id_kategori_produk','harga','kesediaan','satuan','deskripsi','status','stok','foto','type_bisnis', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['id','nama_produk','id_kategori_produk','harga','kesediaan','satuan','deskripsi','status','stok','foto','type_bisnis', 'created_at', 'updated_at'];

    public $appends = [
        'satuan_barang','kategori_produk','bisnis'
    ];

    public function getSatuanBarangAttribute(){
        return $this->belongsTo(Satuan::class,
        'satuan',
            'id')->first();
    }
    public function getKategoriProdukAttribute(){
        return $this->belongsTo(kategori_produk::class,
            'id_kategori_produk',
            'id_kategori_produk')->first();
    }

    public function getBisnisAttribute(){
        return $this->belongsTo(Bisnis::class,
            'type_bisnis',
            'id')->first();
    }

    public function komisis(){
        return $this->belongsToMany(Komisi::class);
    }



}
