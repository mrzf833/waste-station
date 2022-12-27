<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionCreateRequest;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use App\Models\Waste;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        return view('employee.transaction.index');
    }

    public function create()
    {
        $role_client = Role::where('role', 'client')->firstOrFail()->id;
        $wastes = Waste::all();
        $clients = User::where('role_id', $role_client)->get();
        return view('employee.transaction.create', [
            'wastes' => $wastes,
            'clients' => $clients
        ]);
    }

    public function datatable()
    {
        $query = Transaction::join('users as clients', 'transactions.client_id', '=', 'clients.id')
            ->join('users as employees', 'transactions.employee_id', '=', 'employees.id')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->select([
                'transactions.id as id',
                'clients.username as client_username',
                'employees.username as employees_username',
                'transactions.total_point',
                'transactions.created_at',
                DB::raw('SUM(transaction_details.total_waste) as total_waste'),
            ])
            ->groupBy('transactions.id')
            ->getQuery();
            return datatables()->of($query)
            ->addColumn('action', function($data){
                $button = '<a href="'. route('transaction.show', $data->id) .'" class="btn btn-warning mr-2 mx-1">Show</a>';
                $button .= '<button class="btn btn-danger mr-2 btn-delete-transaction mx-1" data="'. $data->id .'">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function editView(Transaction $transaction)
    {
        $role_client = Role::where('role', 'client')->firstOrFail()->id;
        $clients = User::where('role_id', $role_client)->get();
        return view('employee.transaction.edit', [
            'clients' => $clients,
            'transaction' => $transaction
        ]);
    }

    public function edit(Transaction $transaction, Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:users,id'
        ]);

        $role_client = Role::where('role', 'client')->firstOrFail()->id;
        $clients = User::where('role_id', $role_client);

        DB::beginTransaction();
        try{
            $total_point = $transaction->total_point;

            $client_before = $transaction->client()->firstOrFail()->profileUser()->firstOrFail();
            $client_before->point -= $total_point;
            $client_before->save();

            $client_after = $clients->where('id', $request->client_id)->firstOrFail()->profileUser()->firstOrFail();
            $client_after->point += $total_point;
            $client_after->save();

            $transaction->client_id = $request->client_id;
            $transaction->save();

            DB::commit();
            return redirect()->route('transaction.show', $transaction->id)->with([
                'status' => 'success',
                'message' => 'transaksi diedit'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('transaction.edit', $transaction->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function store(TransactionCreateRequest $request)
    {
        $total_point = 0;

        DB::beginTransaction();
        try{
            $transaction = Transaction::create([
                'client_id' => $request->client_id,
                'employee_id' => Auth::id(),
                'total_point' => $total_point,
                'status' => '0'
            ]);

            foreach($request->waste_id as $key=>$value){
                $point_waste = Waste::find($value)->point;
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'waste_id' => $value,
                    'total_waste' => $request->waste_total[$key],
                    'total_point' => $point_waste * $request->waste_total[$key],
                ]);
                $total_point += $point_waste * $request->waste_total[$key];
            }

            $transaction->update([
                'total_point' => $total_point
            ]);

            $profileUser = User::findOrFail($request->client_id)->profileUser()->firstOrFail();
            $profileUser->point += $total_point;
            $profileUser->save();

            DB::commit();
            return redirect()->route('transaction.index')->with([
                'status' => 'success',
                'message' => 'transaksi dibuat'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->route('transaction.create')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function destroy(Transaction $transaction)
    {
        DB::beginTransaction();
        try{
            $client = $transaction->client()->firstOrFail()->profileUser()->firstOrFail();
            $totalPointTransaction = $transaction->total_point;

            $transaction->delete();

            $client->point -= $totalPointTransaction;
            $client->save();

            DB::commit();
            return redirect()->route('transaction.index')->with([
                'status' => 'success',
                'message' => 'transaksi dihapus'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->route('transaction.index')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function show(Transaction $transaction)
    {
        return view('employee.transaction.show', [
            'transaction' => $transaction
        ]);
    }
}
