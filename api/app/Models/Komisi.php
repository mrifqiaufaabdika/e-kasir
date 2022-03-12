<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;


/**
 * @property string $id_komisi
 * @property string $nama_grup
 * @property string $type
 * @property float $nominal_komisi
 * @property float $persen
 * @property string $pegawai
 * @property string $produk
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

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['id_komisi', 'nama_grup', 'type', 'nominal_komisi', 'persen', 'pegawai', 'produk','status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['id_komisi', 'nama_grup', 'type', 'nominal_komisi', 'persen', 'pegawai', 'produk','status', 'created_at', 'updated_at'];

    public $casts = [
      'pegawai' => 'json',
      'produk' => 'json',
    ];

//    public $appends = [
//        'pegawai',
//        'produk'
//    ];
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
