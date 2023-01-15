<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Base\Controller;
use App\Models\Bisnis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public $title = 'Dashboard';

    public function __construct()
    {
        $this->middleware('permission:transaksi-list|transaksi-create|transaksi-edit|transaksi-delete', ['only' => 'index', 'show']);
        $this->middleware('permission:transaksi-create', ['only' => 'create', 'store']);
        $this->middleware('permission:transaksi-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:transaksi-delete', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        //
        $bisnis =  Bisnis::all();

        if ($bisnis) {
            return [
                'value' => compact('bisnis'),
                'msg' => "Data {$this->title} Ditemukan"
            ];
        }

    }
}
