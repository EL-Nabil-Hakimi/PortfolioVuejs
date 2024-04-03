<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $this->generateToken($user);
                
            return response()->json(['token' => $token], 200)
                ->cookie('token', $token, 60);
        }
    
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    protected function generateToken(User $user)
    {
        $payload = [
            'user_id' => $user->id,
            'email' => $user->email,
        ];
        
        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        return $token;
    }
}




