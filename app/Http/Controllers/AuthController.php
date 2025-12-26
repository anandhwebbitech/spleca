<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;



class AuthController extends Controller
{
    //
    public function Register(Request $request)
    {
        try {

            // VALIDATION
            $validator = Validator::make($request->all(), [
                'first_name'   => 'required|string|max:100',
                'last_name'    => 'required|string|max:100',
                'email'        => 'required|email|unique:users,email',
                'password'     => 'required|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            // STORE USER
            User::create([
                'name'         => $request->first_name . ' ' . $request->last_name,
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Registration completed successfully'
            ], 200);

        } catch (Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }
}
