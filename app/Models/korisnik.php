<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class korisnik extends Model
{
    use HasFactory,Notifiable,HasApiTokens;
    protected $table = 'korisnik';

    // Kolone koje su masovno dodeljive (fillable)
    protected $fillable = [
        'ime', 'email', 'password',
    ];

    // Kolone koje treba sakriti kada se korisnik dohvati
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Kolone koje treba konvertovati u određene tipove podataka
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Metoda koja se koristi za dobijanje svih narudžbina ovog korisnika
    /**
     * Summary of porudzbina
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function porudzbina()
    {
        return $this->hasMany(Order::class);
    }


}
