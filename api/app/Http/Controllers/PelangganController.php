<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Base\KeyGen;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller {

    public $title = 'Pelanggan';

    public function __construct()
    {
        $this->middleware('permission:pelanggan-list|pelanggan-create|pelanggan-edit|pelanggan-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:pelanggan-create', ['only' => 'create', 'store']);
        $this->middleware('permission:pelanggan-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:pelanggan-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = Pelanggan::search($request,new Pelanggan());

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
        $data = new Pelanggan();
        $data->id_member =  KeyGen::randomKey("","",true,8);
        $data->nama = $request->nama;
        $data->nomor_hp  = $request->nomor_hp;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->status = "Aktif";



        if ($data->save()) {
            return [
                'code' => 1,
                'value' => $data,
                'msg' => "{$this->title} baru berhasil disimpan"
            ];
        }

        return [
            'code' => 0,
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
        /** @var Pelanggan $data */
        $data = Pelanggan::find($id);

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
        /** @var Pelanggan $data */
        $data = Pelanggan::find($id);

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
        /** @var Pelanggan $data */
        $data = Pelanggan::find($id);



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
        /** @var Pelanggan $data */
        $data = Pelanggan::find($id);

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

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response|array
     */
    public function getByPhone(Request $request)
    {

        /** @var Pelanggan $data */

        $data = Pelanggan::where('nomor_hp','=',$request->nomor_hp)->first();

        if ($data) {
            return [
                'code' => 1,
                'value' => $data,
                'msg' => "{$this->title} # ditemukan"
            ];
        }

        return [
            'code' => 0,
            'value' => [],
            'msg' => "{$this->title} # tidak ditemukan"
        ];
    }

}
