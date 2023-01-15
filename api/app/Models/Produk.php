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
    protected $fillable = ['id','nama_produk','id_kategori_produk','harga','kesediaan','satuan','deskripsi','status','stok','foto','type_bisnis','detail_kendaraan', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['id','nama_produk','id_kategori_produk','harga','kesediaan','satuan','deskripsi','status','stok','foto','type_bisnis','detail_kendaraan', 'created_at', 'updated_at'];

    public $appends = [
        'satuan_barang','kategori_produk','bisnis','pegawai_komisi'
    ];

    public function getSatuanBarangAttribute(){
        $satuan =  $this->belongsTo(Satuan::class,
        'satuan',
            'id')->first();
        return $satuan['nama_satuan'];
    }
    public function getKategoriProdukAttribute(){
        $nama= $this->belongsTo(kategori_produk::class,
            'id_kategori_produk',
            'id_kategori_produk')->first();

        return $nama['nama_kategori_produk'];
    }

    public function getBisnisAttribute(){
        $bisnis =  $this->belongsTo(Bisnis::class,
            'type_bisnis',
            'id')->first();
        return $bisnis['nama'];
    }

    public function getPegawaiKomisiAttribute(){
        return $this->komisis()->where('status','=','aktif')->where('type','=','Produk')->get()->makeHidden(['produk'])->unique();
    }
    public function komisis(){
        return $this->belongsToMany(Komisi::class,"komisi_detail","produk_id","komisi_id");
    }



}
