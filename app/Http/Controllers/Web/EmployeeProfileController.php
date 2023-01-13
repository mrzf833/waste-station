<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('employee.profile.edit', [
            'user' => $user
        ]);
    }

    public function processEdit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' =>'nullable',
            'telephone' => 'required',
            'address' => 'required'
        ]);

        // dd($request->all());

        DB::beginTransaction();
        try{
            $user = Auth::user();
            $user->update([
                'name' => $request->name,
            ]);

            $user->profileUser()->update([
                'telephone' => $request->telephone,
                'address' => $request->address
            ]);

            if($request->password){
                $user->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            DB::commit();
            if($request->password){
                return redirect()->route('login')->with([
                    'status' => 'success',
                    'message' => 'Profile dan Password berhasil diganti'
                ]);
            }

            return redirect()->route('employee.profile.show')->with([
                'status' => 'success',
                'message' => 'Profile berhasil diganti'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('employee.profile.show')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
