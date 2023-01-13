<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        try{
            $credentials = Arr::only($request->all(), ['username', 'password']);
            if (!Auth::attempt($credentials))
            {            
                throw abort(422, 'The provided credentials do not match our records.');
            }

            $roleUser = Auth::user()->role->role;
            // dd($roleUser);
            if($roleUser != Role::EMPLOYEE && $roleUser != Role::ADMIN){
                Auth::logout();

                return redirect()->route('login')->with([
                    'status' => 'failed',
                    'message' => 'bukan karyawan ataupun admin'
                ]);
            }

            return redirect()->route('dashboard');
        }catch(Exception $e){
            return redirect()->route('login')->with([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('dashboard');
    }
}
