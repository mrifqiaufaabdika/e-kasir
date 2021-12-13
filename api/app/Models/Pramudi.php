<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id
 * @property string $nama_pramudi
 * @property string $alamat
 * @property string $ktp
 * @property string $jenis_kelamin
 * @property string $tanggal_lahir
 * @property string $nomor_hp
 * @property string $foto
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Pramudi extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pramudi';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['nama_pramudi', 'alamat', 'ktp', 'jenis_kelamin', 'tanggal_lahir', 'nomor_hp', 'foto', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['nama_pramudi', 'alamat', 'ktp', 'jenis_kelamin', 'tanggal_lahir', 'nomor_hp', 'foto', 'status', 'created_at', 'updated_at'];

}
