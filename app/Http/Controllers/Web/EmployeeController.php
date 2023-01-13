<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Employee;
use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeEditRequest;
use App\Models\ProfileUser;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Profiler\Profile;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index');
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function datatable()
    {
        $roleId = Role::where('role', Role::EMPLOYEE)->firstOrFail()->id;
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
                'users.created_at',
            ])
            ->getquery();
        return datatables()->of($query)
        ->addColumn('action', function($data){
            $button = '<a href="'. route('employee.show', $data->id) .'" class="btn btn-warning mr-2 mx-1">Edit</a>';
            $button .= '<button class="btn btn-danger mr-2 btn-delete-employee mx-1" data="'. $data->id .'">Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function store(EmployeeCreateRequest $request)
    {
        DB::beginTransaction();
        try{
            $roleEmployeeId = Role::where('role', Role::EMPLOYEE)->first()->id;
            $user = User::create([
                'role_id' => $roleEmployeeId,
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => User::STATUS_ACTIVE,
            ]);

            ProfileUser::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'telephone' => $request->telephone,
                'point' => 0
            ]);

            DB::commit();
            return redirect()->route('employee.index')->with([
                'status' => 'success',
                'message' => 'Karyawan dibuat'
            ]);
        }catch(Exception $e){
            DB::rollBack();

            return redirect()->route('employee.create')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function show(User $user)
    {
        if($user->role->role != Role::EMPLOYEE){
            return redirect()->back()->with([
                'status' => 'failed',
                'message' => 'ini bukan karyawan'
            ]);
        }
        return view('admin.employee.edit', [
            'user' => $user->load('profileUser')
        ]);
    }

    public function edit(EmployeeEditRequest $request, User $user)
    {
        if($user->role->role != Role::EMPLOYEE){
            return redirect()->back()->with([
                'status' => 'failed',
                'message' => 'ini bukan karyawan'
            ]);
        }

        DB::beginTransaction();
        try{

            $user->update([
                'name' => $request->name,
                'status' => $request->status
            ]);

            if($request->password){
                $user->update([
                    'password' => bcrypt($request->password),
                ]);
            }

            $user->profileUser()->update([
                'telephone' => $request->telephone,
                'address' => $request->address,
            ]);

            DB::commit();
            return redirect()->route('employee.index')->with([
                'status' => 'success',
                'message' => 'Karyawan diedit'
            ]);
        }catch(Exception $e){
            DB::rollBack();

            dd($e->getMessage());
            return redirect()->route('employee.show', $user->id)->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }

    public function destroy(User $user){
        if($user->role->role != Role::EMPLOYEE){
            return redirect()->back()->with([
                'status' => 'failed',
                'message' => 'ini bukan karyawan'
            ]);
        }
        DB::beginTransaction();
        try{
            $user->update([
                'status' => User::STATUS_NOT_ACTIVE
            ]);
            DB::commit();
            return redirect()->route('employee.index')->with([
                'status' => 'success',
                'message' => 'Karyawan dihapus'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('employee.index')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
