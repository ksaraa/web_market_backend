<?php

namespace App\Http\Controllers;

use App\Models\korisnik;
use Illuminate\Http\Request;

class KorisnikController extends Controller
{
    public function index()
    {
        $users = korisnik::all();
        return view('korisnik.index', compact('korisnik'));
    }
    
    public function create()
    {
        return view('korisnik.create');
    }
    public function store(Request $request)
    {
        // Validacija podataka iz forme
        $validatedData = $request->validate([
            'ime' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            // Dodajte ostala pravila validacije prema potrebi
        ]);

        // Kreiranje novog korisnika
        $user = new korisnik();
        $user->name = $request->input('ime');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        // Dodajte ostala polja korisnika prema potrebi
        $user->save();

        return redirect()->route('korisnik.index')->with('success', 'Novi korisnik je uspešno kreiran.');
    }
    public function edit($id)
    {
        $user = korisnik::findOrFail($id);
        return view('korisnik.edit', compact('korisnik'));
    }
    public function update(Request $request, $id)
    {
        // Validacija podataka iz forme
        $validatedData = $request->validate([
            'ime' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            // Dodajte ostala pravila validacije prema potrebi
        ]);

        // Pronalaženje korisnika po ID-u
        $user = korisnik::findOrFail($id);

        // Ažuriranje korisnika
        $user->name = $request->input('ime');
        $user->email = $request->input('email');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        // Dodajte ostala polja korisnika za ažuriranje prema potrebi
        $user->save();

        return redirect()->route('korisnik.index')->with('success', 'Korisnik je uspešno ažuriran.');
    }
    public function destroy($id)
    {
        $user = korisnik::findOrFail($id);
        $user->delete();

        return redirect()->route('korisnik.index')->with('success', 'Korisnik je uspešno obrisan.');
    }



}
