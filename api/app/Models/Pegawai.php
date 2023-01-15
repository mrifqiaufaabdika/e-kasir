<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $nip
 * @property string $nik
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $telepon
 * @property string $agama
 * @property string $status_nikah
 * @property string $alamat
 * @property string $email
 * @property int $id_kategori_pegawai
 * @property float $gaji_pokok
 * @property string $tanggal_lahir
 * @property string $tanggal_terima
 * @property string $tanggal_keluar
 * @property string $foto
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Pegawai extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pegawai';
    protected $primaryKey = 'nip';
    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'telepon', 'agama', 'status_nikah', 'alamat', 'email', 'id_kategori_pegawai', 'gaji_pokok', 'tanggal_lahir', 'tanggal_terima', 'tanggal_keluar', 'foto', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    public $searchable = ['nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'telepon', 'agama', 'status_nikah', 'alamat', 'email', 'id_kategori_pegawai', 'gaji_pokok', 'tanggal_lahir', 'tanggal_terima', 'tanggal_keluar', 'foto', 'status', 'created_at', 'updated_at'];

    public $appends = [
      'kategori_pegawai'
    ];

    public function getKategoriPegawaiAttribute(){
        $kategori= $this->belongsTo(kategori_pegawai::class,
            'id_kategori_pegawai',
            'id')->first();

        return $kategori;
    }


    public function komisis(){
        return $this->belongsToMany(Komisi::class);
    }



}
