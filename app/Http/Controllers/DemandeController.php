<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;



class DemandeController extends Controller
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
        //
        return view("annonce.dmdcreate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

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

        $of= new Demande;
        $of->titre = $request->titre;
        $of->description = $request->description;
        $of->localisation = $request->localisation;
        $of->prix = $request->prix;
        $of->renouvelable = $request->renouv;
        $of->duree=$request->duree;
        $of->etat = "active";
        $of->type = $request->type;
        $of->user_id = $request->user;
        if($request->photo)
            $of->images=$path;

        $of->save();
        return redirect("/home")->with("message","Demande bien publiée.");
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
        $dmd=Demande::findOrFail($id);
        $sous = [];
        return view("annonce.dmdshow",compact("dmd"),compact(("sous")));
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
        $dmd=Demande::findOrFail($id);
        if($dmd->user_id == Auth::id())
         return view("annonce.dmdedit",compact("dmd"));
        else
        return back()->with("message","Désolé ! Vous ne pouvez modifier que vos demandes !");
       

    
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
            'duree' => "",
            'renouvelable' => "",
            'prix' => "",
            'images' => ""


        ]);

        Demande::whereId($id)->update($data);

        return redirect("/home")->with("message","Demande mise à jour avec succès !");
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
}