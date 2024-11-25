<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        try{
            // cek email ada atau tidak
            $user = User::where('email', $data["email"])->first();
            if(!$user) return redirect()->back()->with('error', 'Email user tidak ditemukan!');

            if(Auth::attempt($data)){
                logger()->info('Auth check after login:', ['auth' => Auth::check()]);
                logger()->info('Session ID:', ['session_id' => session()->getId()]);
                
                return redirect()->route('login.success');
            }   
    
            return redirect()->back()->with('error','Password salah, silahkan check kembali akun password anda!');
        }catch(\Throwable $th){
            return redirect()->back()->withError($th->getMessage());
        }
    }

    public function register(UserRequest $request)
    {
        $data = $request->validated();

        try{
            $data["password"] = bcrypt($data["password"]);

            $user = User::create($data);
            $user->syncRoles('user');
    
            return redirect()->route('auth.register.success');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try{
            Auth::logout();
            return redirect()->route('auth.view.login');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
