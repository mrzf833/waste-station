<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientEditRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        return view('employee.client.index');
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
                'profile_users.address',
                'profile_users.telephone',
                'profile_users.point',
                'users.created_at',
            ])
            ->getquery();
        return datatables()->of($query)
        ->addColumn('action', function($data){
            $button = '<a href="'. route('client.show', $data->id) .'" class="btn btn-warning mr-2 mx-1">Edit</a>';
            $button .= '<button class="btn btn-danger mr-2 btn-delete-client mx-1" data="'. $data->id .'">Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function show(User $user)
    {
        $roleId = Role::where('role', Role::CLIENT)->firstOrFail()->id;
        $user = $user->where('role_id', $roleId)->where('id', $user->id)->firstOrFail();
        return view('employee.client.edit', [
            'user' => $user
        ]);
    }

    public function edit(ClientEditRequest $request, User $user)
    {
        $roleId = Role::where('role', Role::CLIENT)->firstOrFail()->id;
        $user = $user->where('role_id', $roleId)->where('id', $user->id)->firstOrFail();
        DB::beginTransaction();
        try{
            $user->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);

            $user->profileUser()->update([
                'telephone' => $request->telephone,
                'address' => $request->address,
            ]);

            DB::commit();
            return redirect()->route('client.index')->with([
                'status' => 'success',
                'message' => 'client diedit'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('client.show', $user->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function destroy(User $user)
    {
        $roleId = Role::where('role', Role::CLIENT)->firstOrFail()->id;
        $statusNonActive = Role::where('role', User::STATUS_NOT_ACTIVE)->firstOrFail()->id;
        $user = $user->where('role_id', $roleId)->where('id', $user->id)->firstOrFail();
        try{
            $user->update([
                'status' => $statusNonActive
            ]);
            return redirect()->route('client.index')->with([
                'status' => 'success',
                'message' => 'client di non aktif'
            ]);
        }catch(Exception $e){
            return redirect()->route('client.index')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
