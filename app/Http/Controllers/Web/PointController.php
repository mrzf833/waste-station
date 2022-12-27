<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PointEditRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        return view('admin.point.index');
    }

    public function datatable()
    {
        $roleId = Role::where('role', Role::CLIENT)->firstOrFail()->id;
        $query = User::where('role_id', $roleId)
            ->join('profile_users', 'users.id', '=', 'profile_users.user_id')
            ->select([
                'users.id',
                'users.username',
                'users.name',
                'users.email',
                'users.status',
                'profile_users.point',
                'users.created_at',
            ])
            ->getquery();
        return datatables()->of($query)
        ->addColumn('action', function($data){
            $button = '<a href="'. route('point.show', $data->id) .'" class="btn btn-warning mr-2 mx-1">Edit</a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function show(User $user)
    {
        return view('admin.point.show', [
            'user' => $user
        ]);
    }

    public function edit(PointEditRequest $request, User $user)
    {
        try{
            $user->profileUser()->firstOrFail()->update([
                'point' => $request->point
            ]);
            return redirect()->route('point.show', $user->id)->with([
                'status' => 'success',
                'message' => 'point diedit'
            ]);
        }catch(Exception $e){
            return redirect()->route('point.show', $user->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
