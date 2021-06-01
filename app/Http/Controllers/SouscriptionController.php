<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Souscription;

use App\Models\Rendezvous;

class SouscriptionController extends Controller
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


    }

    public function rdvcreate($id)
    {
        //
        $sous=Souscription::findOrFail($id);
         return view("rdv.create",compact("sous"));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            "titre" => "required|max:255",
        ]);
        return  back()->with("message","Souscription réussie".$request->titre);


    }

    public function rdvstore(Request $request,$id)
    {
        $data = $request->validate([
            'lieu' => 'required:max:100',
            'date' => 'required',
            'heure' => ['regex:/^(([0-1][0-9])|(2[0-3])):[0-5][0-9]$/']
            
        ]);

        $date = $request->date." ".$request->heure.":00";

        $rdv= new Rendezvous; 
        $rdv->lieu = $request->lieu;
        $rdv->date_rdv = $date;
        $rdv->souscription_id = $id;
        $rdv->etat = "active";


        $rdv->save();
        return redirect()->route("sous.show",$id)->with("message","Rendez-vous bien pris.");
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
        $sous=Souscription::findOrFail($id);
        $rdv = $sous->rdv;
        $rdv = Rendezvous::where("souscription_id",$id)->orderBy("created_at","desc")->get();
        return view("annonce.sousshow",compact("sous","rdv"));
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
