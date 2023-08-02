<?php

namespace App\Http\Controllers;

use App\Models\CategoriePathologie;
use App\Models\Pharmacie;
use App\Models\Produit;
use DB;
use Illuminate\Http\Request;

use Inertia\Inertia;
use Redirect;
use TheSeer\Tokenizer\Exception;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        return Inertia::render('Produit/AfficherProduit', [
            'produits' => $produits
        ]);
    }


    public function afficher()
    {
        //
    }

    /**Afficher la page d"accueil
     * 
     */

    public function home()
    {

        return Inertia::render('Home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $pharmacies = Pharmacie::all();

        $categories = CategoriePathologie::all();

        return Inertia::render('Produit/CreateProduit',[

            'pharmacies'=> $pharmacies,
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prix' => 'required|numeric',
            'categorie_pathologie_id' => 'required|exists:categorie_pathologies,id',
            'pharmacie_id' => 'required|exists:pharmacies,id'
        ]);

        

        try{

            DB::beginTransaction();
            
            $produit = Produit::create($validatedData);


            DB::commit();
        
        }catch(Exception $e){
            DB::rollBack();
            
           
        }
        return redirect()->back();
        

       
       
        
    }

    public function edit(Produit $produit)
    {
        return Inertia::render('Produit/EditProduit',[
            'produit'=>$produit
        ]);
    }

    
     
    public function update(Request $request, Produit $produit)
    {
        
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prix' => 'required|numeric',
            'categorie_pathologie_id' => 'required|exists:categorie_pathologies,id',
            'pharmacie_id' => 'required|exists:pharmacies,id'
        ]);

        $produit->update($validatedData);

        //return Redirect::route('produit.afficher');

    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();

        return Redirect::route('produit.afficher');
    }
}