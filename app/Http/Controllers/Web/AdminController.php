<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', [
            'user' => $user
        ]);
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }

    public function processChangePassword(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        DB::beginTransaction();
        try{
            Auth::user()->update([
                'password' => bcrypt($request->password)
            ]);
            Auth::logout();

            DB::commit();
            return redirect()->route('login')->with([
                'status' => 'success',
                'message' => 'Password berhasil diganti'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('logine')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]); 
        }
    }
}
