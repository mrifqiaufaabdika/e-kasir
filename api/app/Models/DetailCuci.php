<?php

namespace App\Models;

use App\Models\Base\SelfModel;
use App\Traits\Searchable;

/**
 * @property integer $id_detail_cuci
 * @property integer $id_detail_faktur
 * @property integer $id_kendaraan
 * @property string $dilayani
 * @property string $created_at
 * @property string $updated_at
 */
class DetailCuci extends SelfModel
{
    use Searchable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detail_cuci';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['id_detail_cuci', 'id_detail_faktur', 'id_kendaraan', 'dilayani', 'created_at', 'updated_at'];

    /**
     * The attributes that are searchable.
     * 
     * @var array
     */
    public $searchable = ['id_detail_cuci', 'id_detail_faktur', 'id_kendaraan', 'dilayani', 'created_at', 'updated_at'];

}
