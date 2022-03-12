<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Kasbon;
use Illuminate\Http\Request;

class KasbonController extends Controller {

    public $title = 'Kasbon';

    public function __construct()
    {
        $this->middleware('permission:kasbon-list|kasbon-create|kasbon-edit|kasbon-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:kasbon-create', ['only' => 'create', 'store']);
        $this->middleware('permission:kasbon-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:kasbon-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = Kasbon::search($request,new Kasbon());

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
        $data = new Kasbon();

        $data->nomor_faktur = $request->input('nomor_faktur');
        $data->pencatat = $request->input('pencatat');
        $data->peminjam = $request->input('peminjam');
        $data->total = $request->input('total');
        $data->Status = $request->input('Status');
        $data->tempo = $request->input('tempo');
        $data->riyawat_bayar = $request->input('riyawat_bayar');

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
        /** @var Kasbon $data */
        $data = Kasbon::find($id);

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
        /** @var Kasbon $data */
        $data = Kasbon::find($id);

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
        $id = $request->input('nomor_faktur');
        /** @var Kasbon $data */
        $data = Kasbon::find($id);

        $data->nomor_faktur = $request->input('nomor_faktur');
        $data->pencatat = $request->input('pencatat');
        $data->peminjam = $request->input('peminjam');
        $data->total = $request->input('total');
        $data->Status = $request->input('Status');
        $data->tempo = $request->input('tempo');
        $data->riyawat_bayar = $request->input('riyawat_bayar');

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
        /** @var Kasbon $data */
        $data = Kasbon::find($id);

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
