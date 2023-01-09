<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\ProfileUser;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try{
            $credentials = Arr::only($request->all(), ['email', 'password']);
            if (!Auth::attempt($credentials))
            {            
                throw abort(422, 'The provided credentials do not match our records.');
            }

            return redirect()->route('user.profile.index');
        }catch(Exception $e){
            return redirect()->route('landing.home')->with([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function processRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'name' => 'required',
            'telephone' => 'required',
            'address' => 'required'
        ]);

        DB::beginTransaction();
        try{
            $roleNasabah = Role::where('role', 'client')->first()->id;
            $user = User::create([
                'role_id' => $roleNasabah,
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => '0'
            ]);

            ProfileUser::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'telephone' => $request->telephone,
                'point' => 0
            ]);

            DB::commit();
            return redirect()->route('landing.home')->with([
                'status' => 'success',
                'message' => 'register success'
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('landing.home')->with([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function processLogout()
    {
        Auth::logout();

        return redirect()->route('landing.home');
    }
}
