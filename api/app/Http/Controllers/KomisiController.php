<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Base\KeyGen;
use App\Models\Komisi;
use App\Models\pegawai;
use App\Models\Produk;
use Illuminate\Http\Request;
use function React\Promise\all;

class KomisiController extends Controller
{

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
        $data = Komisi::search($request, new Komisi());



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
        $produk = Produk::selectRaw(implode(',',['produk.id as value', "CONCAT('(',bisnis.nama,') ',nama_produk) as text",'satuan','type_bisnis','id_kategori_produk']))
            ->join('bisnis', 'produk.type_bisnis', '=', 'bisnis.id')
            ->where("status", '=', 'Aktif')
            ->orderBy('produk.id')
            ->get();

        $pegawai = Pegawai::selectRaw(implode(',', ["nip as value", "CONCAT('(',nama_kategori,') ',nama) as text", 'nama', 'email', 'telepon']))->join('kategori_pegawai', 'pegawai.id_kategori_pegawai', '=', 'kategori_pegawai.id')->where('status', '=', 'aktif')->get();

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

        $id = KeyGen::randomKey("KM", "", false, 5);
        /**
         * @params Komisi $data
         */
        $data = new Komisi();
        $data->id = $id;
        $data->nama_grup = $request->input("nama_grup");
        $data->type = $request->input("type");

        $data->status = "Aktif";


        if ($request->input("tipe_nilai") == "Nominal") {
            $data->nominal_komisi = $request->input("nominal");
            $data->persen = null;
        } else {
            $data->persen = $request->input("persen");
            $data->nominal_komisi = null;

        }


        if ($data->save()) {


            $pegawais = Pegawai::find(json_decode($request->file('pegawai')->get(), true));
            $produks = Produk::find(json_decode($request->file('produk')->get(), true));


            if ($request->input("type") == "Produk") {
                foreach ($produks as $produk) {
                    $data->pegawais()->attach($pegawais, ['komisi_id' => $id, 'produk_id' => $produk->id]);
                }

            } else {
                        $data->pegawais()->attach($pegawais, ['komisi_id' => $id]);
            }


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
