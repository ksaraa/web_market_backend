<?php

namespace App\Http\Controllers;

use App\Models\proizvodi;
use Illuminate\Http\Request;

class ProizvodKontroler extends Controller
{
      // Prikaz svih proizvoda
      public function index()
      {
          $products = proizvodi::all();
          return view('proizvodi.index', compact('proizvodi'));
      }
  
      // Prikaz pojedinačnog proizvoda
      public function prikaz($id)
      {
          $product = proizvodi::findOrFail($id);
          return view('proizvodi.show', compact('proizvodi'));
      }
  
      // Dodavanje proizvoda
      public function create()
      {
          // Prikaz forme za dodavanje proizvoda
          return view('proizvodi.create');
      }
  
      public function store(Request $request)// Validacija i čuvanje novog proizvoda u bazi podataka
      {
        // Validacija podataka
        $validatedData = $request->validate([
        'ime' => 'required|max:255',
        'opis' => 'nullable',
        'cena' => 'required|numeric',
        'kolicina_na_stanju'=> 'required|numeric'
        // Dodajte ostale validacije prema potrebi
    ]);

    // Kreiranje novog proizvoda
    $product = new proizvodi();
    $product->ime = $request->input('ime');
    $product->opis = $request->input('opis');
    $product->cena = $request->input('cena');
    $product->kolicina_na_stanju=$request->input('kolicina_na_stanju');
    // Dodajte ostale polje proizvoda prema potrebi
    $product->save();

    return redirect()->route('proizvodi.index')->with('success', 'Proizvod je uspešno dodat.');
          
      }
  
      // Uređivanje postojećeg proizvoda
      public function edit($id)// Prikaz forme za uređivanje proizvoda
      {
        $product = proizvodi::findOrFail($id);
        return view('proizvodi.edit', compact('proizvodi'));
          
      }
  
      public function update(Request $request, $id)// Validacija i ažuriranje proizvoda u bazi podataka
      {
          // Validacija podataka
    $validatedData = $request->validate([
        'ime' => 'required|max:255',
        'opis' => 'nullable',
        'cena' => 'required|numeric',
        // Dodajte ostale validacije prema potrebi
    ]);

    // Ažuriranje postojećeg proizvoda
    $product = proizvodi::findOrFail($id);
    $product->ime = $request->input('ime');
    $product->opis = $request->input('opis');
    $product->cena = $request->input('cena');
    // Dodajte ostale polje proizvoda prema potrebi
    $product->save();

    return redirect()->route('proizvodi.index')->with('success', 'Proizvod je uspešno ažuriran.');
     
      }
  
      // Brisanje proizvoda
      public function destroy($id)// Brisanje proizvoda iz baze podataka
      {
        $product = proizvodi::findOrFail($id);
        $product->delete();
    
        return redirect()->route('proizvodi.index')->with('success', 'Proizvod je uspešno obrisan.');
          
      }
}
