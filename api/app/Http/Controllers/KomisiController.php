<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Base\KeyGen;
use App\Models\Komisi;
use App\Models\pegawai;
use App\Models\produk;
use Illuminate\Http\Request;

class KomisiController extends Controller {

    public $title = 'Komisi';

    public function __construct()
    {
        $this->middleware('permission:komisi-list|komisi-create|komisi-edit|komisi-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:komisi-create', ['only' => 'create', 'store']);
        $this->middleware('permission:komisi-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:komisi-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = Komisi::search($request,new Komisi());

        if ($data) {
            return [
                'value' => $data,
                'msg' => "Data {$this->title} Ditemukan"
            ];
        }

        return [
            'value' => [],
            'msg' => "Data {$this->title} Tidak Ditemukan"
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|array
     */
    public function create()
    {
        $produk = produk::select(['id_produk as value', 'nama_produk as text'])
            ->where("status",'=','Aktif')
            ->orderBy('id_produk')
            ->get();

        $pegawai = Pegawai::selectRaw(implode(',',["nip as value", "CONCAT('(',nip,') ',nama) as text", 'nama','email', 'telepon']))->where('status','=','aktif')->get();

        if ($produk && $pegawai) {
            return [
                'value' => compact(
                    'produk',
                    'pegawai'
                ),
                'msg' => "data produk dan pegawai ditemukan"
            ];
        }

        return [
            'value' => [],
            'msg' => "Roles tidak ditemukan"
        ];
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function store(Request $request)
    {
        /**
         * @params Komisi $data
         */
        $data = new Komisi();
        $data->id_komisi =  KeyGen::randomKey("KM","",true,5);
        $data->nama_grup =  $request->input("nama_grup");
        $data->type =  $request->input("type");
        $data->pegawai =  $request->input("pegawai");
        $data->status =  "Aktif";

        if ($data->type == "Transaksi"){
            $data->produk =  null;
        }else{
            $data->produk =  $request->input("produk");
        }

        if ($request->input("tipe_nilai")=="Nominal"){
            $data->nominal_komisi =  $request->input("nominal");
            $data->persen =  null;
        }else{
            $data->persen =  $request->input("persen");
            $data->nominal_komisi = null;

        }


        

        if ($data->save()) {
            return [
                'value' => $data,
                'msg' => "{$this->title} baru berhasil disimpan"
            ];
        }

        return [
            'value' => [],
            'msg' => "{$this->title} baru gagal disimpan"
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response|array
     */
    public function show($id)
    {
        /** @var Komisi $data */
        $data = Komisi::find($id);

        if ($data) {
            return [
                'value' => $data,
                'msg' => "{$this->title} #{$id} ditemukan"
            ];
        }

        return [
            'value' => [],
            'msg' => "{$this->title} #{$id} tidak ditemukan"
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response|array
     */
    public function edit($id)
    {
        /** @var Komisi $data */
        $data = Komisi::find($id);

        if ($data) {
            return [
                'value' => $data,
                'msg' => "{$this->title} #{$id} ditemukan"
            ];
        }

        return [
            'value' => [],
            'msg' => "{$this->title} #{$id} tidak ditemukan"
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function update(Request $request)
    {
        $id = $request->input('_id');
        /** @var Komisi $data */
        $data = Komisi::find($id);

        

        if ($data->save()) {
            return [
                'value' => $data,
                'msg' => "{$this->title} #{$id} berhasil diperbarui"
            ];
        }

        return [
            'value' => [],
            'msg' => "{$this->title} #{$id} gagal diperbarui"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response|array
     */
    public function destroy($id)
    {
        /** @var Komisi $data */
        $data = Komisi::find($id);

        if ($data->delete()) {
            return [
                'value' => $data,
                'msg' => "{$this->title} #{$id} berhasil dihapus"
            ];
        }

        return [
            'value' => [],
            'msg' => "{$this->title} #{$id} gagal dihapus"
        ];
    }
}
