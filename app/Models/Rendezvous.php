<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;

    public function sous() {
        return $this->belongsTo(Souscription::class);
    }

    public function user() {
         $us=User::find(Souscription::find($this->souscription_id)->user_id);
         return $us;
    }
}
