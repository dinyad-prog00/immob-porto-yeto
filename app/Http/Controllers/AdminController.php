<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Offre;
use App\Models\Demande;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = User::where("admin",true)->get();
        $offs = Offre::all();
        $dmds = Demande::all();
        return view("admin.index",compact("admins","offs","dmds"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.create");
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
            'email' => 'required',
        ]);

        $user=User::where("email",$request->email)->first();
        if($user)
        {
        	$user->admin=true;
        	$user->save();
        	return redirect()->route("admin.index")->with("message","Admin bien ajouté.");
        }
        else
        	return back()->with("message","Aucun utilisateur n'a cet émail : ".$request->email);
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
        $admins = User::where("admin",true)->get();
        if(count($admins) <= 1)
        {
        	return back()->with("message","Impossible de supprimer tous les administrateurs");
        }
        else{
        	$user=User::findOrfail($id);
        	$user->admin=false;
        	$user->save();
        	return back()->with("message","Admin bien défait");

        }
        
    }
}
