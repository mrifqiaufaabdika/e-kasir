<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Bisnis;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Param;

class KeuanganController extends Controller {

    public $title = 'keuangan';

    public function __construct()
    {
        $this->middleware('permission:keuangan-list|keuangan-create|keuangan-edit|keuangan-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:keuangan-create', ['only' => 'create', 'store']);
        $this->middleware('permission:keuangan-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:keuangan-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = Keuangan::search($request,new Keuangan());

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
        $bisnis = Bisnis::selectRaw(implode(',',["id as value", 'nama as text']))->orderBy('id')->get();
        return [
            'value' => compact(
                'bisnis'),
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
         * @param Keuangan $data
         */
        $data = new Keuangan();
        $data->pencatat = $request->input("pencatat");
        $data->bisnis = $request->input("bisnis");
        $data->jenis = $request->input("jenis");
        $data->total = $request->input("total");
        $data->keterangan = $request->input("keterangan");

        /**
         * @param Bisnis $bisnis
         */
        $bisnis = Bisnis::findOrFail($data->bisnis);
        if ($data->jenis == "Debit"){
            $bisnis->saldo = $bisnis->saldo + $data->total;
        }else{
            $bisnis->saldo = $bisnis->saldo - $data->total;
        }

        $bisnis->update();
        $data->saldo =  $bisnis->saldo;

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
        /** @var Keuangan $data */
        $data = Keuangan::find($id);

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
        /** @var Keuangan $data */
        $data = Keuangan::find($id);

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
        /** @var Keuangan $data */
        $data = Keuangan::find($id);

        

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
        /** @var Keuangan $data */
        $data = Keuangan::find($id);

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
