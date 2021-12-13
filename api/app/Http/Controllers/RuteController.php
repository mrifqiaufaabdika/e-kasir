<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller {

    public $title = 'Rute';

    public function __construct()
    {
        $this->middleware('permission:rute-list|rute-create|rute-edit|rute-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:rute-create', ['only' => 'create', 'store']);
        $this->middleware('permission:rute-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:rute-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = Rute::search($request,new Rute());

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
        $data = new Rute();

        $data->kode_rute = $request->input('kode_rute');
        $data->nama_rute = $request->input('nama_rute');
        $data->id_halte_awal = $request->input('id_halte_awal');
        $data->id_halte_akhir = $request->input('id_halte_akhir');
        $data->jalur = $request->input('jalur');
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
        /** @var Rute $data */
        $data = Rute::find($id);

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
        /** @var Rute $data */
        $data = Rute::find($id);

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
        /** @var Rute $data */
        $data = Rute::find($id);

        $data->kode_rute = $request->input('kode_rute');
        $data->nama_rute = $request->input('nama_rute');
        $data->id_halte_awal = $request->input('id_halte_awal');
        $data->id_halte_akhir = $request->input('id_halte_akhir');
        $data->jalur = $request->input('jalur');
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
        /** @var Rute $data */
        $data = Rute::find($id);

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
