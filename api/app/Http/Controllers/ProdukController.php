<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Base\Controller;
use App\Models\Base\KeyGen;
use App\Models\Bisnis;
use App\Models\kategori_produk;
use App\Models\produk;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public $title = 'Produk';

    public function __construct()
    {
        $this->middleware('permission:produk-list|produk-create|produk-edit|produk-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:produk-create', ['only' => 'create', 'store']);
        $this->middleware('permission:produk-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:produk-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */

    public function index(Request $request)
    {
        $data = produk::search($request, new produk());

        if ($data){
            return [
                'value' => $data,
                'msg' => "Data {$this->title} Ditemukan"
            ];
        }
        return [
            'value' => [],
            'msg' => "Data {$this->title} Tidak Ditemukan"
        ];
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|array
     */
    public function create()
    {

        $type_bisnis = Bisnis::selectRaw(implode(',',["id as value", "nama as text"]))->get();
        $kategori_produk = kategori_produk::selectRaw(implode(',',["id_kategori_produk as value", "nama_kategori_produk as text"]))->get();
        $satuan = Satuan::selectRaw(implode(',',["id as value", "nama_satuan as text"]))->get();
        $kesediaan = json_decode('[{"value":1,"text":"Tersedia"},{"value":2,"text":"Tidak Tersedia"}]');
        return [
            'value' => compact(
                'type_bisnis',
                'kategori_produk',
                'satuan',
                'kesediaan'
            ),
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
        /** @var produk $data */
        $data = new produk();
        $data->id_produk =  KeyGen::randomKey("P","",false,"4");
        $data->nama_produk =  $request->input("nama_produk");
        $data->id_kategori_produk =  $request->input("id_kategori_produk");
        $data->harga =  $request->input("harga");
        $data->kesediaan =  $request->input("kesediaan");
        $data->satuan =  $request->input("satuan");
        $data->deskripsi =  $request->input("deskripsi");
        $data->status =  $request->input("status");
        $data->stok =  $request->input("stok");
        $data->type_bisnis =  $request->input("type_bisnis");




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
        /** @var produk $data */
        $data = produk::find($id);

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
        /** @var produk $data */
        $data = produk::find($id);

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
        /** @var produk $data */
        $data = produk::find($id);



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
        /** @var produk $data */
        $data = produk::find($id);

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
