<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacie extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'region', 'prefecture', 'telephone'];

    public function categoiePathologie()
    {
        return $this->hasMany(CategoriePathologie::class);

    } 

    //Génération automatique d'un identifiant à la création d'une nouvelle pharmacie

    

    // Utiliser un trait pour générer un UUID avant la création
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = $model->generateUniqueIdentifier();
        });
    }

    // Générer une identification unique basée sur les initiales du nom et de la préfecture
    protected function generateUniqueIdentifier()
    {
        $nomInitials = substr(str_replace(' ', '', strtolower($this->nom)), 0,2);
        $prefectureInitials = substr(str_replace(' ', '', strtolower($this->prefecture)), 0, 2);

        // Compter le nombre de pharmacies existantes avec les mêmes initiales
        $count = 0 ;
        $existingPharmaciesCount = Pharmacie::where('uuid', 'like', $nomInitials . '__' . $prefectureInitials . '%')->count();

        $count = $existingPharmaciesCount;
        // Incrémenter le chiffre dynamiquement
        $dynamicNumber = $count + 1;

        return $nomInitials . $dynamicNumber . $prefectureInitials;
    }

    // ...


}
