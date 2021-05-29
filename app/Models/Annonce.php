<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    //Son créateur
    public function user() {
        return $this->belongsTo(User::class);
    }

    //Les souscriptions
    public function souscriptions() {
        return $this->belongsToMany(User::class,"souscriptions");
    }

    
}
