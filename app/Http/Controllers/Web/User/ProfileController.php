<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientProfileEditRequest;
use App\Models\PointExchange;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
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

        return view('user.dashboard.profile.index', [
            'user' => $user,
            'riwayatSetorTotal' => $riwayatSetorTotal,
            'riwayatPenukaranTotal' => $riwayatPenukaranTotal
        ]);
    }

    public function show()
    {
        $user = Auth::user()->load('profileUser');
        return view('user.dashboard.profile.show', [
            'user' => $user
        ]);
    }

    public function edit(ClientProfileEditRequest $request)
    {
        DB::beginTransaction();
        try{
            Auth::user()->update([
                'name' => $request->name
            ]);

            Auth::user()->profileUser()->update([
                'address' => $request->address,
                'telephone' => $request->telephone
            ]);

            if($request->password){
                Auth::user()->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            DB::commit();
            return redirect()->route('user.profile.index')->with([
                'status' => 'success',
                'message' => 'profile user berhasil di perbaharui'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('user.profile.show')->with([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
