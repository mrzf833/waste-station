<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PointExchangerCreateRequest;
use App\Models\ItemPoint;
use App\Models\PointExchange;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $itemPoints = ItemPoint::where('stock', '>', 0)
            ->get();
        return view('user.dashboard.transaction.index', [
            'itemPoints' => $itemPoints
        ]);
    }

    public function detail(ItemPoint $itemPoint)
    {
        if(Auth::user()->profileUser->point < $itemPoint->point ){
            return redirect()->route('user.transaction.index');
        }
        return view('user.dashboard.transaction.detail', [
            'itemPoint' => $itemPoint
        ]);
    }

    public function checkout(ItemPoint $itemPoint)
    {
        if(Auth::user()->profileUser->point < $itemPoint->point ){
            return redirect()->route('user.transaction.index');
        }
        return view('user.dashboard.transaction.checkout', [
            'itemPoint' => $itemPoint
        ]);
    }

    public function processCheckout(PointExchangerCreateRequest $request, ItemPoint $itemPoint)
    {
        if(Auth::user()->profileUser->point < $itemPoint->point ){
            return redirect()->route('user.transaction.index');
        }

        DB::beginTransaction();
        try{
            PointExchange::create([
                'client_id' => Auth::id(),
                'item_point_id' => $itemPoint->id,
                'point_price' => $itemPoint->point,
                'recipient' => $request->penerima,
                'address' => $request->alamat,
                'postal_code' => $request->kode_pos,
                'status' => '0'
            ]);

            $updateUpdateUsaer = Auth::user()->profileUser;
            $updateUpdateUsaer->point -= $itemPoint->point;
            $updateUpdateUsaer->save();

            $itemPoint->stock--;
            $itemPoint->save();

            DB::commit();
            return redirect()->route('user.transaction.index')->with([
                'status' => 'success',
                'message' => 'berhasil menukarkan point'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('user.transaction.checkout', $itemPoint->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}
