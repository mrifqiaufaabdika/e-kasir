<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Base\Controller;
use App\Models\inventaris_barang;
use App\Models\satuan_barang;
use Illuminate\Http\Request;

class InventarisBarangController extends Controller
{
    public $title = 'Inventaris Barang';

    public function __construct()
    {
        $this->middleware('permission:kategori-pegawai-list|kategori-pegawai-create|kategori-pegawai-edit|kategori-pegawai-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:kategori-pegawai-create', ['only' => 'create', 'store']);
        $this->middleware('permission:kategori-pegawai-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:kategori-pegawai-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */

    public function index(Request $request)
    {
        $data = inventaris_barang::search($request, new inventaris_barang());

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
        $data = new inventaris_barang();



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
        /** @var inventaris_barang $data */
        $data = inventaris_barang::find($id);

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
        /** @var inventaris_barang $data */
        $data = inventaris_barang::find($id);

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
        /** @var inventaris_barang $data */
        $data = inventaris_barang::find($id);



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
        /** @var inventaris_barang $data */
        $data = inventaris_barang::find($id);

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
