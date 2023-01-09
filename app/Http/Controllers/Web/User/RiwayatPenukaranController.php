<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\PointExchange;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatPenukaranController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load('profileUser');
        $riwayatSetorTotal = Transaction::where('client_id', $user->id)
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->groupBy('transaction_details.id')
            ->select(DB::raw("COUNT(transaction_details.id) as jumlah"))
            ->get()[0]->jumlah ?? 0;

        $riwayatPenukaranTotal = PointExchange::where('client_id', $user->id)
            ->select(DB::raw("COUNT(id) as jumlah"))
            ->get()[0]->jumlah ?? 0;

        $riwayatPenukarans = PointExchange::with('itemPoint')->where('client_id', $user->id)->get();
        return view('user.dashboard.riwayat-penukaran.index', [
            'user' => $user,
            'riwayatSetorTotal' => $riwayatSetorTotal,
            'riwayatPenukaranTotal' => $riwayatPenukaranTotal,
            'riwayatPenukarans' => $riwayatPenukarans
        ]);
    }

    public function detail(PointExchange $pointExchange)
    {
        if($pointExchange->client_id != Auth::id()){
            return redirect()->route('user.riwayat_penukaran.index');
        }
        return view('user.dashboard.riwayat-penukaran.detail', [
            'pointExchange' => $pointExchange->load('itemPoint')
        ]);
    }

    public function accepted(PointExchange $pointExchange)
    {
        if($pointExchange->client_id != Auth::id()){
            return redirect()->route('user.riwayat_penukaran.index');
        }

        if($pointExchange->status != PointExchange::SENT){
            return redirect()->route('user.riwayat_penukaran.detail', $pointExchange->id);
        }

        try{
            $pointExchange->update([
                'status' => PointExchange::ACCEPT
            ]);

            return redirect()->route('user.riwayat_penukaran.detail', $pointExchange->id)->with([
                'status' => 'success',
                'message' => 'berhasil Menerima barang'
            ]);
        }catch(Exception $e){
            return redirect()->route('user.riwayat_penukaran.detail', $pointExchange->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}
