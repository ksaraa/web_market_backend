<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proizvodi extends Model
{
    use HasFactory;
    protected $fillable = [
        'ime',            // Naziv proizvoda
        'opis',     // Opis proizvoda
        'cena',           // Cena proizvoda
        'kolicina_na_stanju',  // Količina na stanju
        // Dodajte druge kolone proizvoda ovde
    ];

    // Funkcija koja vraća kategorije koje su povezane sa ovim proizvodom
    public function kategorije()
    {
        return $this->belongsToMany(kategorije::class);
    }

    // Funkcija koja vraća sve narudžbine u kojima se nalazi ovaj proizvod
    public function porudzbina()
    {
        return $this->belongsToMany(porudzbina::class)->withPivot('kolicina', 'cena');
    }
}
