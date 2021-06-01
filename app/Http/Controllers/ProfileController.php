<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;


class ProfileController extends Controller
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
        $pf=Profile::where('user_id',Auth::id())->first();
        if( $pf != null )
            return redirect("/profiles/".$pf->id."/edit");
        else
            return view("profile.create");
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

        /*$data = $request->validate([
            'prenom' => "required",

        ]);*/
         //Haute resolution
         
        

        $pf= new Profile;
        $input = $request->all();
        $pf->prenom = $input['prenom'];
        $pf->adresse = $input['adresse'];
        $pf->telephone = $input['telephone'];
        $pf->user_id = $input['user'];
        $pf->save();

        return redirect("/home")->with('message', "Profile bien enregistré.");


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
    public function edit( $i)
    {
        
        $pf=Profile::findOrFail($i);
        return view("profile.edit",compact("pf"));

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
            'prenom' => "required",
            'adresse' => "",
            'telephone' => "",
            'photo' => "image"


        ]);

        if($request->photo){
            $path = basename($request->photo->store('getimg1'));

            //Base resolution
            $image = InterventionImage::make($request->photo)->widen(500)->encode();
            Storage::put('getimg2/'.$path, $image);
            
         }

        $pf= Profile::find($id);
        $pf->prenom=$request->prenom;
        $pf->adresse=$request->adresse;
        $pf->telephone=$request->telephone;
        if($request->photo)
            $pf->photo=$path;
        $pf->save();

        return back()->with('message', "Profile bien enregistré.");




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
