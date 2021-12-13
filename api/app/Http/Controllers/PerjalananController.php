<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Perjalanan;
use Illuminate\Http\Request;

class PerjalananController extends Controller {

    public $title = 'Perjalanan';

    public function __construct()
    {
        $this->middleware('permission:perjalanan-list|perjalanan-create|perjalanan-edit|perjalanan-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:perjalanan-create', ['only' => 'create', 'store']);
        $this->middleware('permission:perjalanan-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:perjalanan-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = Perjalanan::search($request,new Perjalanan());

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
        $data = new Perjalanan();

        $data->id_pramudi = $request->input('id_pramudi');
        $data->id_bus = $request->input('id_bus');
        $data->id_rute = $request->input('id_rute');
        $data->waktu_mulai = $request->input('waktu_mulai');
        $data->waktu_selesai = $request->input('waktu_selesai');
        $data->koordinat = $request->input('koordinat');
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
        /** @var Perjalanan $data */
        $data = Perjalanan::find($id);

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
        /** @var Perjalanan $data */
        $data = Perjalanan::find($id);

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
        /** @var Perjalanan $data */
        $data = Perjalanan::find($id);

        $data->id_pramudi = $request->input('id_pramudi');
        $data->id_bus = $request->input('id_bus');
        $data->id_rute = $request->input('id_rute');
        $data->waktu_mulai = $request->input('waktu_mulai');
        $data->waktu_selesai = $request->input('waktu_selesai');
        $data->koordinat = $request->input('koordinat');
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
        /** @var Perjalanan $data */
        $data = Perjalanan::find($id);

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
