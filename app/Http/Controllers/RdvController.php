<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rendezvous;

class RdvController extends Controller
{
    public function confirmer($idsous,$id){
        $rdv= Rendezvous::findOrFail($id);
        $rdv->etat="confirme";
        $rdv->save();
        return redirect()->route("sous.show",$idsous)->with("message","Rendez-vous bien confirmé.");
    }

    public function deconfirmer($idsous,$id){
        $rdv= Rendezvous::findOrFail($id);
        $rdv->etat="active";
        $rdv->save();
        return redirect()->route("sous.show",$idsous)->with("message","Rendez-vous bien deconfirmé.");
    }

    public function annuler($idsous,$id){
        $rdv= Rendezvous::findOrFail($id);
        $rdv->etat="annule";
        $rdv->save();
        return redirect()->route("sous.show",$idsous)->with("message","Rendez-vous bien annulé.");
    }

    public function activer($idsous,$id){
        $rdv= Rendezvous::findOrFail($id);
        $rdv->etat="active";
        $rdv->save();
        return redirect()->route("sous.show",$idsous)->with("message","Rendez-vous bien activé.");
    }

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
