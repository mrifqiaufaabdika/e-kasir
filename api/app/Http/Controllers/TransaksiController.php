<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Base\KeyGen;
use App\Models\Bisnis;
use App\Models\kategori_produk;
use App\Models\pegawai;
use App\Models\Produk;
use App\Models\Satuan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller {

    public $title = 'Transaksi';

    public function __construct()
    {
        $this->middleware('permission:transaksi-list|transaksi-create|transaksi-edit|transaksi-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:transaksi-create', ['only' => 'create', 'store']);
        $this->middleware('permission:transaksi-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:transaksi-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = Transaksi::search($request,new Transaksi());

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
    public function create($id)
    {

        $type_bisnis = Bisnis::findOrFail($id,['id','nama']);

        //$produk = Produk::selectRaw(implode(',',["id", "nama_produk", "harga","kesediaan","satuan","deskripsi","stok","type_bisnis","id_kategori_produk"]))->where("status","=","Aktif")->get();
        //$pegawai = Pegawai::selectRaw(implode(',',["nip as value", "CONCAT('(',nip,') ',nama) as text", 'nama']))->where('status','=','aktif')->get();
        $kategori =  kategori_produk::selectRaw(implode(',',["id_kategori_produk as value", "nama_kategori_produk as text"]))->get();
        $satuan =  Satuan::selectRaw(implode(',',["id as value", "nama_satuan as text"]))->orderBy('id')->get();

        $produk = Produk::where('type_bisnis','=',$id)->get();
        return [
            'value' => compact('type_bisnis','kategori','produk','satuan'),
            'msg' => "Data for create {$this->title}"
        ];
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function store(Request $request)
    {


        /** @var Transaksi $data */
        $data = new Transaksi();
        $data->nomor_faktur =  KeyGen::randomKey("","",false,8);
        $data->kasir = $request->input("kasir")['id'];
        $data->member = $request->input("member")['id'];
        $data->total = $request->input("total");
        $data->bayar = $request->input("bayar");
        $data->kembalian = $request->input("kembalian");
        $data->metode_pembayaran = $request->input("metode_pembayaran");
        $data->bisnis = $request->input("bisnis");
        $data->status = $request->input("status");


        return $data;

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
        /** @var Transaksi $data */
        $data = Transaksi::find($id);

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
        /** @var Transaksi $data */
        $data = Transaksi::find($id);

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
        /** @var Transaksi $data */
        $data = Transaksi::find($id);



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
        /** @var Transaksi $data */
        $data = Transaksi::find($id);

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
