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

        $dmd= new Demande;
        $dmd->titre = $request->titre;
        $dmd->description = $request->description;
        $dmd->localisation = $request->localisation;
        $dmd->prix = $request->prix;
        $dmd->renouvelable = $request->renouv;
        $dmd->duree=$request->duree;
        $dmd->etat = "active";
        $dmd->type = $request->type;
        $dmd->user_id = $request->user;
        if($request->photo)
            $dmd->images=$path;
        if($request->has('sanitaire'))
            $dmd->sanitaire=true;
        else
            $dmd->sanitaire=false;

        $dmd->save();
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
            'photo' => "image"


        ]);

        if($request->photo){
            $path = basename($request->photo->store('getimg1'));

            //Base resolution
            $image = InterventionImage::make($request->photo)->widen(500)->encode();
            Storage::put('getimg2/'.$path, $image);
            
         }

        $dmd=Demande::findOrFail($id);

        $dmd->titre = $request->titre;
        $dmd->description = $request->description;
        $dmd->localisation = $request->localisation;
        $dmd->prix = $request->prix;
        $dmd->renouvelable = $request->renouv;
        $dmd->duree=$request->duree;
        $dmd->etat = "active";
        $dmd->type = $request->type;

        if($request->photo)
            $dmd->images=$path;

        if($request->has('sanitaire'))
            $dmd->sanitaire=true;
        else
            $dmd->sanitaire=false;

        $dmd->save();

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
        $dmd=Demande::findOrFail($id);
        $dmd->delete();
        return redirect()->route("admin.index")->with("message","Demande  bien supprimée.");
    
    }

    public function activer($id){
        $dmd= Demande::findOrFail($id);
        $dmd->etat="active";
        $dmd->save();
        return redirect()->route("dmd.show",$id)->with("message","Demande bien activée.");
    }

    public function desactiver($id)
    {
        $dmd= Demande::findOrFail($id);
        $dmd->etat="desactive";
        $dmd->save();
        return redirect()->route("dmd.show",$id)->with("message","Demande bien desactivé.");

    }
}
