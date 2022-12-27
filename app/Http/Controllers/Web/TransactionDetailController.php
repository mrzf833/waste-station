<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionDetailCreateRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Waste;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionDetailController extends Controller
{
    public function create(Transaction $transaction)
    {
        $wastes = Waste::all();
        return view('employee.transaction-detail.create', [
            'transaction' => $transaction,
            'wastes' => $wastes
        ]);
    }

    public function datatable(Transaction $transaction)
    {
        $query = Transaction::where('transactions.id', $transaction->id)
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->join('wastes', 'wastes.id', '=', 'transaction_details.waste_id')
            ->select([
                'transactions.id as transaction_id',
                'transaction_details.id as transaction_detail_id',
                'transaction_details.waste_id',
                'transaction_details.total_waste',
                'transaction_details.total_point',
                'transaction_details.created_at as created_at',
                'wastes.name as waste_name'
            ])
            ->getQuery();
            return datatables()->of($query)
            ->addColumn('action', function($data){
                $button = '<button class="btn btn-danger mr-2 btn-delete-transaction_detail mx-1" data="'. $data->transaction_detail_id .'">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show(Transaction $transaction, TransactionDetail $transactionDetail)
    {
        return view('employee.transaction-detail.edit');
    }

    public function store(TransactionDetailCreateRequest $request, Transaction $transaction)
    {
        $total_point = 0;
        DB::beginTransaction();
        try{
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

            $client = $transaction->client()->firstOrFail()->profileUser()->firstOrFail();
            $client->point += $total_point;
            $client->save();

            $transaction->total_point += $total_point;
            $transaction->save();

            DB::commit();
            return redirect()->route('transaction.show', $transaction->id)->with([
                'status' => 'success',
                'message' => 'transaksi detail sampah dibuat'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('transaction.show', $transaction->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function destroy(Transaction $transaction, TransactionDetail $transactionDetail)
    {
        DB::beginTransaction();
        try{
            $total_point = $transactionDetail->total_point;

            $transaction->total_point -= $total_point;
            $transaction->save();

            $client = $transaction->client()->firstOrFail()->profileUser()->firstOrFail();
            $client->point -= $total_point;
            $client->save();

            $transactionDetail->delete();
            DB::commit();
            return redirect()->route('transaction.show', $transaction->id)->with([
                'status' => 'success',
                'message' => 'transaksi detail sampah dihapus'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('transaction.show', $transaction->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
