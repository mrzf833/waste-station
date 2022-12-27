<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationEducationCreateRequest;
use App\Http\Requests\InformationEducationEditRequest;
use App\Models\InformationEducation;
use Exception;
use Illuminate\Http\Request;

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
        try{
            InformationEducation::create([
                'title' => $request->title,
                'description' => $request->description
            ]);

            return redirect()->route('information_education.index')->with([
                'status' => 'success',
                'message' => 'informasi edukasi dibuat'
            ]);
        }catch(Exception $e){
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
        try{
            $informationEducation->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->route('information_education.index')->with([
                'status' => 'success',
                'message' => 'informasi edukasi diedit'
            ]);
        }catch(Exception $e){
            return redirect()->route('information_education.edit', $informationEducation->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function destroy(InformationEducation $informationEducation)
    {
        try{
            $informationEducation->delete();
            return redirect()->route('information_education.index')->with([
                'status' => 'success',
                'message' => 'informasi edukasi dihapus'
            ]);
        }catch(Exception $e){
            return redirect()->route('information_education.index')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
