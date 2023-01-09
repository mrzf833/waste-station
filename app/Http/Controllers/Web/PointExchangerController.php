<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PointExchange;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointExchangerController extends Controller
{
    public function index()
    {
        return view('admin.point-exchanger.index');
    }
    
    public function datatable()
    {
        $query = DB::table('point_exchanges as pex')
            ->join('users as ur', 'pex.client_id', '=', 'ur.id')
            ->join('item_points as ipo', 'pex.item_point_id', '=', 'ipo.id')
            ->select([
                'pex.id',
                'pex.client_id',
                'pex.item_point_id',
                'pex.point_price',
                'pex.recipient',
                'pex.address',
                'pex.postal_code',
                'pex.accepted',
                'pex.status',
                'ur.email as email',
                'ipo.title as item',
            ])
            ->groupBy('pex.id');

        return datatables()->of($query)
        ->addColumn('status', function($data){
            if($data->status == '0'){
                return 'prosess';
            }else if($data->status == '1'){
                return 'dikirim';
            }else if($data->status == '2'){
                return 'diterima';
            }

            return 'ditolak';
        })
        ->rawColumns(['status'])
        ->make(true);
    }

    public function process()
    {
        return view('admin.point-exchanger.process');
    }

    public function datatableProcess()
    {
        $query = DB::table('point_exchanges as pex')
            ->join('users as ur', 'pex.client_id', '=', 'ur.id')
            ->join('item_points as ipo', 'pex.item_point_id', '=', 'ipo.id')
            ->where('pex.status', PointExchange::PROCESS)
            ->select([
                'pex.id',
                'pex.client_id',
                'pex.item_point_id',
                'pex.point_price',
                'pex.recipient',
                'pex.address',
                'pex.postal_code',
                'pex.accepted',
                'pex.status',
                'ur.email as email',
                'ipo.title as item',
            ])
            ->groupBy('pex.id');

        return datatables()->of($query)
        ->addColumn('status', function($data){
            if($data->status == '0'){
                return 'prosess';
            }else if($data->status == '1'){
                return 'dikirim';
            }else if($data->status == '2'){
                return 'diterima';
            }

            return 'ditolak';
        })
        ->addColumn('action', function($data){
            $button = '<button class="btn btn-success mr-2 btn-sent-point-exchanger mx-1" data="'. $data->id .'">Dikirim</button>';
            $button .= '<button class="btn btn-danger mr-2 btn-rejected-point-exchanger mx-1" data="'. $data->id .'">Ditolak</button>';
            return $button;
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function sent()
    {
        return view('admin.point-exchanger.sent');
    }

    public function datatableSent()
    {
        $query = DB::table('point_exchanges as pex')
            ->join('users as ur', 'pex.client_id', '=', 'ur.id')
            ->join('item_points as ipo', 'pex.item_point_id', '=', 'ipo.id')
            ->where('pex.status', PointExchange::SENT)
            ->select([
                'pex.id',
                'pex.client_id',
                'pex.item_point_id',
                'pex.point_price',
                'pex.recipient',
                'pex.address',
                'pex.postal_code',
                'pex.accepted',
                'pex.status',
                'ur.email as email',
                'ipo.title as item',
            ])
            ->groupBy('pex.id');

        return datatables()->of($query)
        ->addColumn('status', function($data){
            if($data->status == '0'){
                return 'prosess';
            }else if($data->status == '1'){
                return 'dikirim';
            }else if($data->status == '2'){
                return 'diterima';
            }

            return 'ditolak';
        })
        ->rawColumns(['status'])
        ->make(true);
    }

    public function accepted()
    {
        return view('admin.point-exchanger.accepted');
    }

    public function datatableAccepted()
    {
        $query = DB::table('point_exchanges as pex')
            ->join('users as ur', 'pex.client_id', '=', 'ur.id')
            ->join('item_points as ipo', 'pex.item_point_id', '=', 'ipo.id')
            ->where('pex.status', PointExchange::ACCEPT)
            ->select([
                'pex.id',
                'pex.client_id',
                'pex.item_point_id',
                'pex.point_price',
                'pex.recipient',
                'pex.address',
                'pex.postal_code',
                'pex.accepted',
                'pex.status',
                'ur.email as email',
                'ipo.title as item',
            ])
            ->groupBy('pex.id');

        return datatables()->of($query)
        ->addColumn('status', function($data){
            if($data->status == '0'){
                return 'prosess';
            }else if($data->status == '1'){
                return 'dikirim';
            }else if($data->status == '2'){
                return 'diterima';
            }

            return 'ditolak';
        })
        ->rawColumns(['status'])
        ->make(true);
    }

    public function rejected()
    {
        return view('admin.point-exchanger.rejected');
    }

    public function datatableRejected()
    {
        $query = DB::table('point_exchanges as pex')
            ->join('users as ur', 'pex.client_id', '=', 'ur.id')
            ->join('item_points as ipo', 'pex.item_point_id', '=', 'ipo.id')
            ->where('pex.status', PointExchange::REJECT)
            ->select([
                'pex.id',
                'pex.client_id',
                'pex.item_point_id',
                'pex.point_price',
                'pex.recipient',
                'pex.address',
                'pex.postal_code',
                'pex.accepted',
                'pex.status',
                'ur.email as email',
                'ipo.title as item',
            ])
            ->groupBy('pex.id');

        return datatables()->of($query)
        ->addColumn('status', function($data){
            if($data->status == '0'){
                return 'prosess';
            }else if($data->status == '1'){
                return 'dikirim';
            }else if($data->status == '2'){
                return 'diterima';
            }

            return 'ditolak';
        })
        ->rawColumns(['status'])
        ->make(true);
    }

    public function processSent(PointExchange $pointExchange)
    {
        if($pointExchange->status != PointExchange::PROCESS){
            return redirect()->back();
        }

        try{
            $pointExchange->update([
                'status' => PointExchange::SENT
            ]);

            return redirect()->route('point_exchanger.process')->with([
                'status' => 'success',
                'message' => 'Barang Dikirim'
            ]);
        }catch(Exception $e){
            return redirect()->route('point_exchanger.process')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function processRejected(PointExchange $pointExchange)
    {
        if($pointExchange->status != PointExchange::PROCESS){
            return redirect()->back();
        }

        DB::beginTransaction();
        try{
            $client = User::find($pointExchange->client_id)->profileUser;
            $client->point += $pointExchange->point_price;
            $client->save();

            $pointExchange->update([
                'status' => PointExchange::REJECT
            ]);

            DB::commit();
            return redirect()->route('point_exchanger.process')->with([
                'status' => 'success',
                'message' => 'Barang Ditolak'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('point_exchanger.process')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
