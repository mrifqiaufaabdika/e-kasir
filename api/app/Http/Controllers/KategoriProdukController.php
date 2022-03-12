<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Base\Controller;

use App\Models\Base\KeyGen;
use App\Models\kategori_produk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public $title = 'Kategori Produk';

    public function __construct()
    {
        $this->middleware('permission:kategori-produk-list|kategori-produk-create|kategori-produk-edit|kategori-produk-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:kategori-produk-create', ['only' => 'create', 'store']);
        $this->middleware('permission:kategori-produk-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:kategori-produk-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */

    public function index(Request $request)
    {
        $data = kategori_produk::search($request, new kategori_produk());

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
        return [
            'value' => [],
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
        /**
         * @param kategori_produk $data
         */

        $data = new kategori_produk();
        $data->id_kategori_produk = KeyGen::randomKey("KP","","true",2);
        $data->nama_kategori_produk =  $request->input("nama_kategori_produk");



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
        /** @var kategori_produk $data */
        $data = kategori_produk::find($id);

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
        /** @var kategori_produk $data */
        $data = kategori_produk::find($id);

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
        /** @var kategori_produk $data */
        $data = kategori_produk::find($id);



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
        /** @var kategori_produk $data */
        $data = kategori_produk::find($id);

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
