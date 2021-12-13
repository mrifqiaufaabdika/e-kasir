<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller {

    public $title = 'Bus';

    public function __construct()
    {
        $this->middleware('permission:bus-list|bus-create|bus-edit|bus-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:bus-create', ['only' => 'create', 'store']);
        $this->middleware('permission:bus-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:bus-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = Bus::search($request,new Bus());

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
        $data = new Bus();

        $data->nomor_polisi = $request->input('nomor_polisi');
        $data->merek = $request->input('merek');
        $data->jumlah_roda = $request->input('jumlah_roda');
        $data->warna = $request->input('warna');
        $data->kapasitas_duduk = $request->input('kapasitas_duduk');
        $data->kapasitas_berdiri = $request->input('kapasitas_berdiri');
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
        /** @var Bus $data */
        $data = Bus::find($id);

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
        /** @var Bus $data */
        $data = Bus::find($id);

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
        /** @var Bus $data */
        $data = Bus::find($id);

        $data->nomor_polisi = $request->input('nomor_polisi');
        $data->merek = $request->input('merek');
        $data->jumlah_roda = $request->input('jumlah_roda');
        $data->warna = $request->input('warna');
        $data->kapasitas_duduk = $request->input('kapasitas_duduk');
        $data->kapasitas_berdiri = $request->input('kapasitas_berdiri');
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
        /** @var Bus $data */
        $data = Bus::find($id);

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
