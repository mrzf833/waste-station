<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
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
            
        return view('user.dashboard.riwayat-penukaran.index', [
            'user' => $user,
            'riwayatSetorTotal' => $riwayatSetorTotal
        ]);
    }

    public function detail()
    {
        return view('user.dashboard.riwayat-penukaran.detail');
    }
}
