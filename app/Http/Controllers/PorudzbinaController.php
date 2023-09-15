<?php

namespace App\Http\Controllers;

use App\Models\porudzbina;
use Illuminate\Http\Request;

class PorudzbinaController extends Controller
{
    public function index()
    {
        $orders = porudzbina::all();
        return view('porudzbina.index', compact('porudzbina'));
    }
    public function show($id)
    {
        $order = porudzbina::findOrFail($id);
        return view('porudzbina.show', compact('porudzbina'));
    }
    public function create()
    {
    // Prikazivanje forme za kreiranje nove narudžbine
    return view('porudzbina.create');
    }
    public function store(Request $request)
{
    // Validacija podataka iz forme
    $validatedData = $request->validate([
        // Definišite pravila validacije za polja narudžbine
    ]);

    // Kreiranje nove narudžbine
    $order = new porudzbina();
    $order->naziv_kupca = $request->input('naziv_kupca');
    $order->adresa = $request->input('adresa');
    // Dodajte ostala polja narudžbine prema potrebi
    $order->save();

    return redirect()->route('porudzbina.index')->with('success', 'Nova narudžbina je uspešno kreirana.');
}
public function updateStatus(Request $request, $id)
{
    // Validacija podataka iz zahteva
    $validatedData = $request->validate([
        'status' => 'required', // Pravilo validacije za status narudžbine
    ]);

    // Pronalaženje narudžbine po ID-u
    $order = porudzbina::findOrFail($id);

    // Ažuriranje statusa narudžbine
    $order->status = $request->input('status');
    // Dodajte ostala polja za ažuriranje narudžbine prema potrebi
    $order->save();

    return redirect()->route('porudzbina.index')->with('success', 'Status narudžbine je uspešno ažuriran.');
}
public function destroy($id)
{
    // Pronalaženje narudžbine po ID-u
    $order = porudzbina::findOrFail($id);

    // Brisanje narudžbine
    $order->delete();

    return redirect()->route('porudzbina.index')->with('success', 'Narudžbina je uspešno obrisana.');
}
public function edit($id)
{
    $order = porudzbina::findOrFail($id);
    // Prikazuje formu za uređivanje porudžbine, prosleđujući podatke o porudžbini
    return view('porudzbina.edit', compact('porudzbina'));
}

}
