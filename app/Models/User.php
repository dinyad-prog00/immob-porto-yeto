<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Ses offres
    public function offres() {
        return $this->hasMany(Offre::class);
    }

    //Ses demandes
    public function demandes() {
        return $this->hasMany(Demande::class);
    }

    //Profile
    public function profile() {
        return $this->hasMany(Profile::class);
    }

    //Ses souscriptions
    public function souscriptions() {
        return Souscription::where("user_d",$this->id);
    }

    //Souscrit à ses offre
    public function offres_sous() {
        return $this->belongsToMany(Offre::class,"souscriptions");
    }
}
