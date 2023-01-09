<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationEducationCreateRequest;
use App\Http\Requests\InformationEducationEditRequest;
use App\Models\InformationEducation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InformationEducationController extends Controller
{
    public function index()
    {
        return view('employee.information-education.index');
    }

    public function datatable()
    {
        return datatables()->of(InformationEducation::query())
        ->addColumn('action', function($data){
            $button = '<a href="'. route('information_education.show', $data->id) .'" class="btn btn-warning mr-2 mx-1">Edit</a>';
            $button .= '<button class="btn btn-danger mr-2 btn-delete-information_education mx-1" data="'. $data->id .'">Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function create()
    {
        return view('employee.information-education.create');
    }

    public function store(InformationEducationCreateRequest $request)
    {
        DB::beginTransaction();
        try{
            $image = $request->image;
            if($image){
                $name_image = Str::random(5) . date('dmYhis');
                $extension = $image->getClientOriginalExtension();

                $location_image = $image ?  $name_image . '.' . $extension : null;

                $image ? $image->storeAs('public/information-education/', $location_image) : '';
                $name_image = 'public/information-education/' . $location_image;
            }

            InformationEducation::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $name_image
            ]);

            DB::commit();
            return redirect()->route('information_education.index')->with([
                'status' => 'success',
                'message' => 'informasi edukasi dibuat'
            ]);
        }catch(Exception $e){
            DB::rollBack();

            return redirect()->route('information_education.create')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function show(InformationEducation $informationEducation)
    {
        return view('employee.information-education.edit', [
            'informationEducation' => $informationEducation
        ]);
    }

    public function edit(InformationEducationEditRequest $request, InformationEducation $informationEducation)
    {
        DB::beginTransaction();
        try{
            $image = $request->image;

            if($image){
                $imageBefore = $informationEducation->image;

                $name_image = Str::random(5) . date('dmYhis');
                $extension = $image->getClientOriginalExtension();

                $location_image = $image ?  $name_image . '.' . $extension : null;

                $informationEducation->update([
                    'image' => 'public/information-education/' . $location_image,
                ]);

                $image ? $image->storeAs('public/information-education/', $location_image) : '';
                Storage::delete($imageBefore);
            }

            $informationEducation->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            DB::commit();
            return redirect()->route('information_education.index')->with([
                'status' => 'success',
                'message' => 'informasi edukasi diedit'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('information_education.edit', $informationEducation->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function destroy(InformationEducation $informationEducation)
    {
        DB::beginTransaction();
        try{
            $image = $informationEducation->image;
            $informationEducation->delete();
            if($image){
                Storage::delete($image);
            }
            DB::commit();
            return redirect()->route('information_education.index')->with([
                'status' => 'success',
                'message' => 'informasi edukasi dihapus'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('information_education.index')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
