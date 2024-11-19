<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        
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
}
