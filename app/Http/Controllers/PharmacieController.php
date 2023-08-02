<?php

namespace App\Http\Controllers;

use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class PharmacieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pharmacies = Pharmacie::all();
        return Inertia::render('Pharmacie/Index',[
            'pharmacies'=> $pharmacies
        ]);
    }
    //Afficher les pharmacies

    public function afficher_pharmacie()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Pharmacie/CreatePharmacie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'region' => 'required',
            'prefecture' => 'required',
            'telephone' => 'required',
        ]);

        $Pharmacies = Pharmacie::create($validatedData);

        return redirect()->route('pharmacie.index');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /*public function edit(Pharmacie $pharmacies)
    {
        return Inertia::render('Pharmacie/EditPharmacie ',[
            'pharmacies'=> $pharmacies,
        ]);
        
    }*/


    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Pharmacie $pharmacie)
    {

        return Inertia::render('Pharmacie/EditPharmacie',[
            'pharmacie'=> $pharmacie,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request,Pharmacie $pharmacie)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'region' => 'required',
            'prefecture' => 'required|max:255',
            'telephone' => 'required|max:14|min:8',
        ]);

        $pharmacie->update($validatedData);

        return Redirect::route('pharmacie.index')->with('message','Les modifications enrégistrées avec  succès');
            
        
    }
    public function destroy( Pharmacie $pharmacie)
    {
        //$pharmacie=Pharmacie::findOrFail($id);
        $pharmacie->delete();
        return Redirect::route('pharmacie.index')->with('message','La suppression a été effectuée avec succès');
    }
}
