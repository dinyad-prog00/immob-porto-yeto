<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Souscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;



class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("annonce.offrecreate");
    }


    public function souscreate(Offre $offre)
    {
        return view("sous.create",compact("offre"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required:max:100',
            'description' => 'required|max:500',
            'localisation' => 'required',
            'photo' => "image"
            
        ]);

        if($request->photo){
            $path = basename($request->photo->store('getimg1'));

            //Base resolution
            $image = InterventionImage::make($request->photo)->widen(500)->encode();
            Storage::put('getimg2/'.$path, $image);
            
         }

        $of= new Offre;
        $of->titre = $request->titre;
        $of->description = $request->description;
        $of->localisation = $request->localisation;
        $of->prix = $request->prix;
        $of->etat = "active";
        $of->type = $request->type;
        $of->user_id = $request->user;

        if($request->has('sanitaire'))
            $of->sanitaire=true;
        else
            $of->sanitaire=false;
        if($request->photo)
            $of->images=$path;

        $of->save();
        return redirect("/home")->with("message","Offre bien publié.");
    }

    public function sousstore(Request $request,Offre $offre)
    {
        $data = $request->validate([
            "titre" => "required|max:255"
        ]);

        $ss = new Souscription;
        $ss->titre = $request->titre;
        $ss->message = $request->message;
        $ss->user_id = $request->user;
        $ss->offre_id = $offre->id;
        $ss->etat = "active";
        $ss->save();

        return  redirect("/home");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $off=Offre::findOrFail($id);
        $sous = Souscription::where("offre_id",$id)->get();
        return view("annonce.offreshow",compact("off"),compact(("sous")));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $off=Offre::findOrFail($id);
        if($off->user_id == Auth::id())
         return view("annonce.offreedit",compact("off"));
         else
         return back()->with("message","Désolé ! Vous ne pouvez modifier que vos offres !");
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->validate([
            'titre' => "required",
            'description' => "required",
            'localisation' => "",
            'photo' => "image"
            


        ]);

        if($request->photo){
            $path = basename($request->photo->store('getimg1'));

            //Base resolution
            $image = InterventionImage::make($request->photo)->widen(500)->encode();
            Storage::put('getimg2/'.$path, $image);
            
         }

        $off= Offre::findOrFail($id);
        $off->titre = $request->titre;
        $off->description = $request->description;
        $off->localisation = $request->localisation;
        $off->prix = $request->prix;
        $off->etat = "active";
        $off->type = $request->type;

        if($request->has('sanitaire'))
            $off->sanitaire=true;
        else
            $off->sanitaire=false;

        if($request->photo)
            $off->images=$path;

        $off->save();


        return redirect("/home")->with("message","Offre mis à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function retour()
    {
        return back();
    }
}
