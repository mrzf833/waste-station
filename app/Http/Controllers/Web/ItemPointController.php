<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemPointCreateRequest;
use App\Http\Requests\ItemPointEditRequest;
use App\Models\ItemPoint;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemPointController extends Controller
{
    public function index()
    {
        return view('admin.item-point.index');
    }

    public function create()
    {
        return view('admin.item-point.create');
    }

    public function datatable()
    {
        return datatables()->of(ItemPoint::query())
        ->addColumn('action', function($data){
            $button = '<a href="'. route('item_point.show', $data->id) .'" class="btn btn-warning mr-2 mx-1">Edit</a>';
            $button .= '<button class="btn btn-danger mr-2 btn-delete-item_point mx-1" data="'. $data->id .'">Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function store(ItemPointCreateRequest $request)
    {
        DB::beginTransaction();
        try{
            $image = $request->image;
            if($image){
                $name_image = Str::random(5) . date('dmYhis');
                $extension = $image->getClientOriginalExtension();

                $location_image = $image ?  $name_image . '.' . $extension : null;

                $image ? $image->storeAs('public/item-point/', $location_image) : '';
                $name_image = 'public/item-point/' . $location_image;
            }

            ItemPoint::create([
                'title' => $request->title,
                'point' => $request->point,
                'stock' => $request->stock,
                'image' => $name_image,
                'description1' => $request->description1,
                'description2' => $request->description2,
            ]);

            DB::commit();
            return redirect()->route('item_point.index')->with([
                'status' => 'success',
                'message' => 'item point dibuat'
            ]);
        }catch(Exception $e){
            DB::rollBack();

            return redirect()->route('item_point.create')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function show(ItemPoint $itemPoint)
    {
        return view('admin.item-point.edit', [
            'itemPoint' => $itemPoint
        ]);
    }

    public function edit(ItemPointEditRequest $request, ItemPoint $itemPoint)
    {
        DB::beginTransaction();
        try{
            $image = $request->image;

            if($image){
                $imageBefore = $itemPoint->image;

                $name_image = Str::random(5) . date('dmYhis');
                $extension = $image->getClientOriginalExtension();

                $location_image = $image ?  $name_image . '.' . $extension : null;

                $itemPoint->update([
                    'image' => 'public/item-point/' . $location_image,
                ]);

                $image ? $image->storeAs('public/item-point/', $location_image) : '';
                Storage::delete($imageBefore);
            }

            $itemPoint->update([
                'title' => $request->title,
                'point' => $request->point,
                'stock' => $request->stock,
                'description1' => $request->description1,
                'description2' => $request->description2,
            ]);

            DB::commit();
            return redirect()->route('item_point.index')->with([
                'status' => 'success',
                'message' => 'item point diedit'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('item_point.edit', $itemPoint->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function destroy(ItemPoint $itemPoint)
    {
        DB::beginTransaction();
        try{
            $image = $itemPoint->image;
            $itemPoint->delete();
            if($image){
                Storage::delete($image);
            }
            DB::commit();
            return redirect()->route('item_point.index')->with([
                'status' => 'success',
                'message' => 'item point dihapus'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('item_point.index')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
