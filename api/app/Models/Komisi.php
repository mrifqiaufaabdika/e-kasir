<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;


/**
 * @property string $id
 * @property string $nama_grup
 * @property string $type
 * @property float $nominal_komisi
 * @property float $persen
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Komisi extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'komisi';
    protected $primaryKey = 'id';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nama_grup', 'type', 'nominal_komisi', 'persen','status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['id', 'nama_grup', 'type', 'nominal_komisi', 'persen','status', 'created_at', 'updated_at'];



    public $appends = [
        'pegawai',
        'produk'
    ];

    public function getPegawaiAttribute()
    {
        return $this->pegawais()->where('status','=','aktif')->get(['nip','nama','id_kategori_pegawai'])->unique()->makeHidden(['pivot']);
    }

    public function pegawais(){
        return $this->belongsToMany(Pegawai::class,"komisi_detail","komisi_id","pegawai_nip");
    }

    public function getProdukAttribute()
    {
        return $this->produks()->get()->unique();
    }

    public function produks(){
        return $this->belongsToMany(Produk::class,"komisi_detail","komisi_id","produk_id");
    }


//
//    public function getPegawaiAttribute()
//    {
//        return $this->belongsTo(pegawai::class, 'pegawai.id');
//    }
//
//    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
//    public function getProdukAttribute()
//    {
//        return $this->belongsToJson(produk::class, 'produk->id');
//    }
}
