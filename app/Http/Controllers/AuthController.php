<?php

namespace App\Http\Controllers;

use App\Models\korisnik;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $user = korisnik::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Greska u unosu emaila ili passworda',
            ], 401);
        }

        $token = $user->createToken('MyApp')->plainTextToken;

        return response()->json([
            'korisnik' => $user,
            'token' => $token,
        ]);
}
public function logout(Request $request)
{
    $user = $request->user(); // Dohvati ulogovanog korisnika

        if ($user) {
            $user->tokens()->delete(); // Obriši sve tokene korisnika
            return response()->json([
                'message' => 'Logged out successfully',
            ]);
        } else {
            return response()->json([
                'message' => 'User not authenticated',
            ], 401);
        }
    }
}
