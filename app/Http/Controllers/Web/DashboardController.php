<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClient = Role::where('role', Role::CLIENT)->first()
            ->users()->count();
        $totalEmployee = Role::where('role', Role::EMPLOYEE)->first()
            ->users()->count();
        $totalTransactionWaste = Transaction::count();

        $totalTransactionWasteKg = TransactionDetail::sum('total_waste');
        // dd($totalTransactionWaste);

        $totalJanWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 1)->sum('total_waste');
        $totalFebWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 2)->sum('total_waste');
        $totalMarWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 3)->sum('total_waste');
        $totalAprilWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 4)->sum('total_waste');
        $totalMeiWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 5)->sum('total_waste');
        $totalJunaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 6)->sum('total_waste');
        $totalJulWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 7)->sum('total_waste');
        $totalAguWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 8)->sum('total_waste');
        $totalSepWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 9)->sum('total_waste');
        $totalOktWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 10)->sum('total_waste');
        $totalNovWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 11)->sum('total_waste');
        $totalDesWaste = TransactionDetail::whereYear('created_at', Carbon::now()->format('Y'))->whereMonth('created_at', 12)->sum('total_waste');

        return view('dashboard', [
            'totalClient' => $totalClient,
            'totalEmployee' => $totalEmployee,
            'totalTransactionWaste' => $totalTransactionWaste,
            'totalTransactionWasteKg' => $totalTransactionWasteKg,
            'totalJanWaste' => $totalJanWaste,
            'totalFebWaste' => $totalFebWaste,
            'totalMarWaste' => $totalMarWaste,
            'totalAprilWaste' => $totalAprilWaste,
            'totalMeiWaste' => $totalMeiWaste,
            'totalJunaste' => $totalJunaste,
            'totalJulWaste' => $totalJulWaste,
            'totalAguWaste' => $totalAguWaste,
            'totalSepWaste' => $totalSepWaste,
            'totalOktWaste' => $totalOktWaste,
            'totalNovWaste' => $totalNovWaste,
            'totalDesWaste' => $totalDesWaste,
        ]);
    }
}
