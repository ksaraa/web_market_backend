<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class korpa extends Model
{
    use HasFactory;
    protected $fillable = [
        'ime',
        'cena',
        'korisnik_id',
        'proizvod_id',
        'kolicina',
    ];
      // Funkcija koja vraća informacije o proizvodu u korpi
    public function proizvodi()
    {
        return $this->belongsTo(proizvodi::class);
    }
        // Funkcija koja vraća informacije o korisniku koji je vlasnik korpe
        public function korisnik()
        {
            return $this->belongsTo(korisnik::class);
        }

}
