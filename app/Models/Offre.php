<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Souscription;

class Offre extends Model
{
    use HasFactory;


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function dejaSous($id){
    	$s=Souscription::where("user_id",$id)->where("offre_id",$this->id)->get();
    	if(count($s) != 0)
    		return true;
    	else
    		return false;
    }

    //Profile
    public function souscription() {
        return $this->hasMany(Souscription::class);
    }

    
}
