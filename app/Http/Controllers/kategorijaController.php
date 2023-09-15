<?php

namespace App\Http\Controllers;

use App\Models\kategorije;
use Illuminate\Http\Request;

class kategorijaController extends Controller
{
    public function index()
    {
        $categories = kategorije::all();
        return view('kategorije.index', compact('kategorije'));
    }
    public function create()
    {
        return view('kategorije.create');
    }
    public function store(Request $request)
    {
        // Validacija podataka iz forme
        $validatedData = $request->validate([
            'name' => 'required|unique:kategorije,name',
            // Dodajte ostala pravila validacije prema potrebi
        ]);

        // Kreiranje nove kategorije
        $category = new kategorije();
        $category->name = $request->input('ime');
        // Dodajte ostala polja kategorije prema potrebi
        $category->save();

        return redirect()->route('kategorije.index')->with('success', 'Nova kategorija je uspešno kreirana.');
    }
    public function edit($id)
    {
        $category = kategorije::findOrFail($id);
        return view('kategorije.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validacija podataka iz forme
        $validatedData = $request->validate([
            'ime' => 'required|unique:kategorije,name,' . $id,
            // Dodajte ostala pravila validacije prema potrebi
        ]);

        // Pronalaženje kategorije po ID-u
        $category = kategorije::findOrFail($id);

        // Ažuriranje kategorije
        $category->name = $request->input('ime');
        // Dodajte ostala polja kategorije za ažuriranje prema potrebi
        $category->save();

        return redirect()->route('kategorije.index')->with('success', 'Kategorija je uspešno ažurirana.');
    }
    public function destroy($id)
    {
        $category = kategorije::findOrFail($id);
        $category->delete();

        return redirect()->route('kategorije.index')->with('success', 'Kategorija je uspešno obrisana.');
    }

}
