<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Halte;
use Illuminate\Http\Request;

class HalteController extends Controller {

    public $title = 'Halte';

    public function __construct()
    {
        $this->middleware('permission:halte-list|halte-create|halte-edit|halte-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:halte-create', ['only' => 'create', 'store']);
        $this->middleware('permission:halte-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:halte-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = Halte::search($request,new Halte());

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
        $data = new Halte();

        $data->nama_halte = $request->input('nama_halte');
        $data->alamat = $request->input('alamat');
        $data->koordinat = $request->input('koordinat');
        $data->tipe = $request->input('tipe');
        $data->transit = $request->input('transit');
        $data->rute_singgah = $request->input('rute_singgah');
        $data->kapasitas = $request->input('kapasitas');
        $data->status = $request->input('status');

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
        /** @var Halte $data */
        $data = Halte::find($id);

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
        /** @var Halte $data */
        $data = Halte::find($id);

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
        $id = $request->input('id');
        /** @var Halte $data */
        $data = Halte::find($id);

        $data->nama_halte = $request->input('nama_halte');
        $data->alamat = $request->input('alamat');
        $data->koordinat = $request->input('koordinat');
        $data->tipe = $request->input('tipe');
        $data->transit = $request->input('transit');
        $data->rute_singgah = $request->input('rute_singgah');
        $data->kapasitas = $request->input('kapasitas');
        $data->status = $request->input('status');

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
        /** @var Halte $data */
        $data = Halte::find($id);

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
