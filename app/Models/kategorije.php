<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorije extends Model
{
    use HasFactory;
    protected $fillable = [
        'ime',
        'opis',
    ];

    // Funkcija koja vraća proizvode koji pripadaju ovoj kategoriji
    public function proizvodi()
    {
        return $this->hasMany(proizvodi::class);
    }
}
