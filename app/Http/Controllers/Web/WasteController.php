<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\WasteCreateRequest;
use App\Http\Requests\WasteEditRequest;
use App\Http\Requests\WasteImageCreateRequest;
use App\Models\Image;
use App\Models\Waste;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WasteController extends Controller
{
    public function index()
    {
        return view('employee.waste.index');
    }

    public function create()
    {
        return view('employee.waste.create');
    }

    public function store(WasteCreateRequest $request)
    {
        DB::beginTransaction();
        $imagesName = [];
        $i = 0;
        try{
            $waste = Waste::create([
                'name' => $request->name,
                'point' => $request->point,
                'type' => $request->type
            ]);

            foreach($request->images as $image){
                if($image){
                    $name_image = Str::random(5) . date('dmYhis');
                    $extension = $image->getClientOriginalExtension();
                }

                $location_image = $image ?  $name_image . '.' . $extension : null;

                Image::create([
                    'foreign_id' => $waste->id,
                    'url' => 'public/waste/' . $location_image,
                    'model' => 'Waste'
                ]);


                $image ? $image->storeAs('public/waste/', $location_image) : '';
                $imageName[$i++] = 'public/waste/' . $location_image;
            }

            DB::commit();
            return redirect()->route('waste.index')->with([
                'status' => 'success',
                'message' => 'sampah dibuat'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            foreach($imagesName as $imageName){
                Storage::delete($imageName);
            }
            return redirect()->route('waste.create')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function datatable()
    {
        return datatables()->of(Waste::query())
        ->addColumn('action', function($data){
            $button = '<a href="'. route('waste.show', $data->id) .'" class="btn btn-warning mr-2 mx-1">Edit</a>';
            $button .= '<button class="btn btn-danger mr-2 btn-delete-waste mx-1" data="'. $data->id .'">Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function destroy(Waste $waste)
    {

        try{
            $waste->delete();

            foreach($waste->images as $image){
                Storage::delete($image->url);
            }

            return redirect()->route('waste.index')->with([
                'status' => 'success',
                'message' => 'sampah dihapus'
            ]); 
        }catch(Exception $e){
            return redirect()->route('waste.index')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function show(Waste $waste)
    {
        return view('employee.waste.edit', [
            'waste' => $waste->load('images')
        ]);
    }


    public function edit(WasteEditRequest $request, Waste $waste)
    {

        // dd($request->all());

        $imagesNameBefore = [];
        $imagesNameAfter = [];
        DB::beginTransaction();
        try{
            $waste->update([
                'name' => $request->name,
                'point' => $request->point,
                'type' => $request->type
            ]);

            foreach($request->images as $keyImage => $image){
                if($image){
                    $imageBefore = $waste->images()->find($keyImage);
                    $imageNameBefore = $imageBefore->url;
                    $imagesNameBefore[$keyImage] = $imageNameBefore;

                    $name_image = Str::random(5) . date('dmYhis');
                    $extension = $image->getClientOriginalExtension();

                    $location_image = $image ?  $name_image . '.' . $extension : null;

                    $imageBefore->update([
                        'url' => 'public/waste/' . $location_image,
                    ]);

                    $image ? $image->storeAs('public/waste/', $location_image) : '';
                    $imagesNameAfter[$keyImage] = 'public/waste/' . $location_image;
                    Storage::delete($imageNameBefore);
                }
            }

            DB::commit();
            return redirect()->route('waste.index')->with([
                'status' => 'success',
                'message' => 'sampah diedit'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('waste.edit', $waste->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function deleteImage(Waste $waste, Image $image)
    {
        $image = $waste->images()->find($image->id);

        DB::beginTransaction();
        try{
            $image->delete();

            Storage::delete($image->url);
            DB::commit();
            return redirect()->route('waste.show', $waste->id)->with([
                'status' => 'success',
                'message' => 'gambar sampah dihapus'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('waste.edit', $waste->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function createImage(Waste $waste)
    {
        return view('employee.waste.image.create', [
            'waste' => $waste
        ]);
    }

    public function storeImage(WasteImageCreateRequest $request, Waste $waste)
    {
        DB::beginTransaction();
        $imagesName = [];
        $i = 0;
        try{
            foreach($request->images as $image){
                if($image){
                    $name_image = Str::random(5) . date('dmYhis');
                    $extension = $image->getClientOriginalExtension();
                }

                $location_image = $image ?  $name_image . '.' . $extension : null;

                Image::create([
                    'foreign_id' => $waste->id,
                    'url' => 'public/waste/' . $location_image,
                    'model' => 'Waste'
                ]);


                $image ? $image->storeAs('public/waste/', $location_image) : '';
                $imageName[$i++] = 'public/waste/' . $location_image;
            }

            DB::commit();
            return redirect()->route('waste.show', $waste->id)->with([
                'status' => 'success',
                'message' => 'gambar sampah ditambah'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            foreach($imagesName as $imageName){
                Storage::delete($imageName);
            }
            return redirect()->route('waste.create.image', $waste->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
