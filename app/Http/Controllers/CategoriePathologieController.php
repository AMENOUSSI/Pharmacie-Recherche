<?php

namespace App\Http\Controllers;

use App\Models\CategoriePathologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class CategoriePathologieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function afficher()
    {   $categories = CategoriePathologie::all();
        return Inertia::render('Categorie/Afficher',[
            'categories'=> $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoriePathologie::all();

        return inertia('Categorie/CreateCategorie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'nom' => 'required',
        ]);
        $categorie = CategoriePathologie::create($validated);

        return redirect()->back();
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriePathologie $categorie)
    {
        return Inertia::render('Categorie/Edit',[
            'categorie'=>$categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriePathologie $categorie)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
        ]);

        $categorie->update($validated);
        //return Redirect::route('categorie.afficher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriePathologie $categorie)
    {
        $categorie->delete();
        return Redirect::route('categorie.afficher');
    }
}
