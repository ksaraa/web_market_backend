<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\korisnik;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }
   /* protected function create(array $data)
{
    return korisnik::create([
        'ime' => $data['ime'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
}*/
protected function create(Request $request)
{

    // Validacija unosa korisnika
    $request->validate([
        'ime' => 'required|string',
        'email' => 'required|string',
        'password' => 'required|string',
    ]);
    // Kreiranje korisnika u bazi
   
    
    $user = korisnik::create([
        'ime' => $request->input('ime'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    return response()->json(['Korisnik' => $user, 'message' => 'Korisnik je uspesno registrovan.'], 201);
}

}
