<?php

namespace App\Http\Controllers;

use App\Models\korpa;
use App\Models\proizvodi;
use Illuminate\Http\Request;

class korpaController extends Controller
{
    public function index()
    {
        $korpaItems = korpa::getContent();
        return view('korpa.index', compact('korpaItems'));
    }

    // Dodavanje proizvoda u korpu
    public function store(Request $request)
    {
        $proizvodi = proizvodi::find($request->proizvodi_id);

        korpa::add([
            'id' => $proizvodi->id,
            'ime' => $proizvodi->name,
            'cena' => $proizvodi->price,
            'kolicina' => $request->quantity,
        ]);

        return redirect()->route('korpa.index')->with('success', 'Proizvod je dodat u korpu.');
    }

    // Ažuriranje količine proizvoda u korpi
    public function update(Request $request, $id)
    {
        korpa::update($id, [
            'kolicina' => $request->quantity,
        ]);

        return redirect()->route('korpa.index')->with('success', 'Korpa je ažurirana.');
    }

    // Brisanje proizvoda iz korpe
    public function destroy($id)
    {
        korpa::remove($id);

        return redirect()->route('korpa.index')->with('success', 'Proizvod je uklonjen iz korpe.');
    }
}
