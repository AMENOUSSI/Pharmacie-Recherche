<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom','prix','categorie_pathologie_id','pharmacie_id'];

    public function categoriePathologie(){
        
        return $this->belongsTo(CategoriePathologie::class);
    }
}
