<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\PointExchange;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatSetorController extends Controller
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
        return view('user.dashboard.riwayat-setor.index', [
            'user' => $user,
            'riwayatSetorTotal' => $riwayatSetorTotal,
            'riwayatPenukaranTotal' => $riwayatPenukaranTotal
        ]);
    }

    public function datatable()
    {
        $query = Transaction::join('users as employees', 'transactions.employee_id', '=', 'employees.id')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->where('client_id', Auth::id())
            ->select([
                'transactions.id as id',
                'employees.username as employees_username',
                'transactions.total_point',
                'transactions.created_at',
                DB::raw('SUM(transaction_details.total_waste) as total_waste'),
            ])
            ->groupBy('transactions.id')
            ->getQuery();
        return datatables()->of($query)
        ->addColumn('action', function($data){
            $button = '<a href="'. route('user.riwayat_setor.detail', $data->id) .'" class="px-4 py-2 bg-[#f1c40f] text-white rounded hover:bg-[#f39c12] duration-300">Show</a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function detail(Transaction $transaction)
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

        $riwayatSetor = Transaction::join('users as employees', 'transactions.employee_id', '=', 'employees.id')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->where('transactions.id', $transaction->id)
            ->select([
                'transactions.id as id',
                'employees.username as employees_username',
                'transactions.total_point',
                'transactions.created_at',
                DB::raw('SUM(transaction_details.total_waste) as total_waste'),
            ])
            ->groupBy('transactions.id')
            ->first();

        return view('user.dashboard.riwayat-setor.detail', [
            'user' => $user,
            'riwayatSetorTotal' => $riwayatSetorTotal,
            'riwayatPenukaranTotal' => $riwayatPenukaranTotal,
            'riwayatSetor' => $riwayatSetor
        ]);
    }

    public function datatableDetail(Transaction $transaction)
    {
        if($transaction->client_id != Auth::id()){
            return abort(404);
        }

        $query = TransactionDetail::join('wastes as ws', 'transaction_details.waste_id', '=', 'ws.id')
            ->where('transaction_details.transaction_id', $transaction->id)
            ->select([
                'transaction_details.id',
                'transaction_details.waste_id',
                'ws.name as waste_name',
                'transaction_details.total_waste',
                'transaction_details.total_point'
            ])
            ->getQuery();
        return datatables()->of($query)
        ->make(true);
    }
}
