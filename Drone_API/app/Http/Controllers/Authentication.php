<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authentication extends Controller
{
    /**
     * Register
     */
    public function register(RegisterRequest $request){
        $user = User::create([
            "name"=>$request["name"],
            "email"=>$request["email"],
            "password"=>bcrypt($request["password"]),
            "farm_id"=>$request["farm_id"],
        ]);

        $token = $user->createToken('API Token',['select', 'create', 'delete', 'update'])->plainTextToken;
        return response()->json([
            'message' => "Your account is created",
            'user' => $user,
            'token' => $token
        ],200);
    }

    /**
     * Login
     */
    public function login(LoginRequest $request){
        $credentails = $request->only('email','password');
     
        if(Auth::attempt($credentails)){
            $user = Auth::user();
            $token = $user->createToken("API TOKEN")->plainTextToken;
            
            return response()->json([
                'message'=>'Login successfully!',
                'token'=>$token
            ],200);
        }
        return response()->json(['message'=>"Invalid credetail !"],401);
    }

    /**
     * Log out
     */
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out'],200);
    }
    
}
