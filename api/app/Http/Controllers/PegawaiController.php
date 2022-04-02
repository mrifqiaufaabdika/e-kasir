<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\Controller;
use App\Models\Base\KeyGen;
use App\Models\kategori_pegawai;
use App\Models\pegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PegawaiController extends Controller {

    public $title = '';

    public function __construct()
    {
        $this->middleware('permission:pegawai-list|pegawai-create|pegawai-edit|pegawai-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:pegawai-create', ['only' => 'create', 'store']);
        $this->middleware('permission:pegawai-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:pegawai-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $data = pegawai::search($request,new pegawai());



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
        $kategori_pegawai = kategori_pegawai::selectRaw(implode(',',["id as value", 'nama_kategori as text']))->orderBy('id')->get();
        return [
            'value' => compact(
                'kategori_pegawai'),
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
         * @param Pegawai $data
         */
        $data = new pegawai();
        $data->nip = KeyGen::randomKey("","","true",3);
        $data->nik = $request->input("nik");
        $data->nama = $request->input("nama");
        $data->nama = $request->input("nama");
        $data->jenis_kelamin = $request->input("jenis_kelamin");
        $data->tempat_lahir = $request->input("tempat_lahir");
        $data->telpon = $request->input("telpon");
        $data->agama = $request->input("agama");
        $data->alamat = $request->input("alamat");
        $data->email = $request->input("email");
        $data->id_kategori_pegawai = $request->input("id_kategori_pegawai");
        $data->gaji_pokok = $request->input("gaji_pokok");
        $data->tanggal_lahir = $request->input("tanggal_lahir");
        $data->tanggal_terima = $request->input("tanggal_terima");

        $data->status_nikah = $request->input("status_nikah");
        $data->status = $request->input("status");

        if ($request->input("status") == 'Nonaktif'){
            $today = Carbon::now();
            $data->tanggal_keluar = $today->toDateTimeString();
        }



        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $original_filename = $image->getClientOriginalName();
            $split_filename = explode('.', $original_filename);
            $file_ext = end($split_filename);
            $image_name = 'avatar-' . Str::uuid() . '.' . $file_ext;


            $image->move(storage_path('app/public/avatar'), $image_name);
            $current_image_path = storage_path('app/public/image_profile');
            if (file_exists($current_image_path)) {
                unlink($current_image_path);
            }


            $data->foto = $image_name;
        }

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
        /** @var pegawai $data */
        $data = pegawai::find($id);

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
        /** @var pegawai $data */
        $data = pegawai::find($id);

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
        /** @var pegawai $data */
        $data = pegawai::find($id);

        

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
        /** @var pegawai $data */
        $data = pegawai::find($id);

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
