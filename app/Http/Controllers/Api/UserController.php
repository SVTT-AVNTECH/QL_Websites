<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Validator;
use Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $user->createToken('Personal Access Token');
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function register(Request $req)
{
    $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ];

    $customMessage = [
        'name.required' => 'Name is required',
        'email.required' => 'Email is required',
        'email.email' => 'Email is invalid',
        'email.unique' => 'Email is already taken',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 6 characters',
    ];

    $validation = Validator::make($req->all(), $rules, $customMessage);

    if ($validation->fails()) {
        return response()->json([
            'message' => $validation->errors(),
        ], 422);
    }

    $user = User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => Hash::make($req->password),
    ]);

    $access_token = $user->createToken($req->email)->accessToken;

    return response()->json([
        'message' => 'User registered Successfully',
        'access_token' => $access_token,
    ], 201);
}


    public function details($id)
    {

        $userDetails = User::find($id);

        $userProduct = Product::where('user_id', $id)->get();

        return response()->json([

            'userDetails' => $userDetails,
            'userProduct' => $userProduct,
            'name' => $userDetails->name,

        ]);
    }
}
