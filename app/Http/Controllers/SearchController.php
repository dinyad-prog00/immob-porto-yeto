<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Demande;

class SearchController extends Controller
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
    public function get()
    {
        $keyword = array("récent");
        $dmds=Demande::all();
        $offs=Offre::all();

        return view("annonce.search",compact("dmds"),compact("offs"));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        
        $offs = Offre::where("created_at",">",'01-01-2020 00:00:00');
        $dmds = Demande::where("created_at",">" ,'01-01-2020 00:00:00');
        
        $keyword = [];

        if($prix=$request->get('opp')){
            $op="";
            $opt=$request->get('opt');
            if($opt=="inf")
               $op="<";
            else if($opt=="sup")
                $op=">";
            else
                $op="=";
            
            $offs = $offs->where("prix",$op, $prix);
            $dmds = $dmds->where("prix",$op ,$prix);
        }

        if($loca=$request->get('localisation')){

            $offs = $offs->where("localisation","like", '%'.ucfirst($loca).'%');
            $dmds = $dmds->where("localisation","like" ,'%'.ucfirst($loca).'%');
        }

        if($san=$request->get('sanitaire')){
            $offs = $offs->where("sanitaire",$san=="oui");
            $dmds = $dmds->where("sanitaire",$san=="oui");
        }

        if($type=$request->get('type')){
            $keyword[]=$type;
            $offs = $offs->where("type",$type);
            $dmds = $dmds->where("type",$type);
        }

        if($request->get('date')){
                $offs = $offs->orderBy("created_at","desc");
                $dmds = $dmds->orderBy("created_at","desc");
        }

        $offs = $offs->take(10)->get();
        $dmds = $dmds->take(10)->get();

        if($request->get('autres')){
            if(! in_array('offre', $request->get('autres')))
                $offs = [];

            if( ! in_array('demande', $request->get('autres')))
                $dmds = [];
        }

        return view("annonce.search",compact("offs"),compact("dmds"),compact("keyword"));
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
