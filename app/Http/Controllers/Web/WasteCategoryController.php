<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\WasteCategoryCreateRequest;
use App\Http\Requests\WasteCategoryEditRequest;
use App\Models\WasteCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WasteCategoryController extends Controller
{
    public function index()
    {
        return view('employee.waste-category.index');
    }

    public function datatable()
    {
        return datatables()->of(WasteCategory::query())
        ->addColumn('action', function($data){
            $button = '<a href="'. route('waste_category.show', $data->id) .'" class="btn btn-warning mr-2 mx-1">Edit</a>';
            $button .= '<button class="btn btn-danger mr-2 btn-delete-waste_category mx-1" data="'. $data->id .'">Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function create()
    {
        return view('employee.waste-category.create');
    }

    public function store(WasteCategoryCreateRequest $request)
    {
        try{
            $image = $request->image;
            if($image){
                $name_image = Str::random(5) . date('dmYhis');
                $extension = $image->getClientOriginalExtension();

                $location_image = $image ?  $name_image . '.' . $extension : null;

                $image ? $image->storeAs('public/waste-category/', $location_image) : '';
                $name_image = 'public/waste-category/' . $location_image;
            }

            WasteCategory::create([
                'name' => $request->name,
                'code' => $request->code,
                'image' => $name_image,
                'description' => $request->description
            ]);

            return redirect()->route('waste_category.index')->with([
                'status' => 'success',
                'message' => 'Kategori Sampah dibuat'
            ]);
        }catch(Exception $e){
            return redirect()->route('waste_category.create')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function show(WasteCategory $wasteCategory)
    {
        return view('employee.waste-category.edit', [
            'wasteCategory' => $wasteCategory
        ]);
    }

    public function edit(WasteCategoryEditRequest $request, WasteCategory $wasteCategory)
    {
        DB::beginTransaction();
        try{
            $wasteCategory->update([
                'name' => $request->name,
                'code' => $request->code,
                'description' => $request->description,
            ]);

            $image = $request->image;

            if($image){
                $imageBefore = $wasteCategory->image;

                $name_image = Str::random(5) . date('dmYhis');
                $extension = $image->getClientOriginalExtension();

                $location_image = $image ?  $name_image . '.' . $extension : null;

                $wasteCategory->update([
                    'image' => 'public/waste-category/' . $location_image,
                ]);

                $image ? $image->storeAs('public/waste-category/', $location_image) : '';
                Storage::delete($imageBefore);
            }

            DB::commit();
            return redirect()->route('waste_category.index')->with([
                'status' => 'success',
                'message' => 'Kategori Sampah diedit'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('waste_category.edit', $wasteCategory->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function destroy(WasteCategory $wasteCategory)
    {
        DB::beginTransaction();
        try{
            $image = $wasteCategory->image;
            $wasteCategory->delete();
            if($image){
                Storage::delete($image);
            }
            DB::commit();
            return redirect()->route('waste_category.index')->with([
                'status' => 'success',
                'message' => 'kategori sampah dihapus'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('waste_category.index')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
