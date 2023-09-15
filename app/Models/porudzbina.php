<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class porudzbina extends Model
{
    use HasFactory;
    protected $fillable = [
        'korisnik_id',
        'ukupan_iznos',
        'status',
        // Dodajte druge kolone narudžbine ovde
    ];

    // Funkcija koja vraća proizvode u okviru ove narudžbine
    public function proizvod()
    {
        return $this->belongsToMany(proizvod::class)->withPivot('kolicina', 'cena');
    }

    // Funkcija koja vraća korisnika koji je napravio ovu narudžbinu
    public function korisnik()
    {
        return $this->belongsTo(korisnik::class);
    }
}
