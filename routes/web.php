<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\CategoriePathologieController;
use Illuminate\Foundation\Application;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');


/**Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::get('/produit', [ProduitController::class, 'afficher'])->name('produit.afficher');

Route::post('/produit', [ProduitController::class, 'store'])->name('produit.store');

Route::get('/produit/create', [ProduitController::class, 'create'])->name('produit.create');

Route::get('/produit/{produit}/edit', [ProduitController::class, 'edit'])->name('produit.edit');

Route::put('/produit/{produit}', [ProduitController::class, 'update'])->name('produit.update');

Route::delete('/produit/{produit}', [ProduitController::class, 'destroy'])->name('produit.delete');

Route::get('/pharmacie', [PharmacieController::class, 'index'])->name('pharmacie.index');

Route::post('/pharmacie', [PharmacieController::class, 'store'])->name('pharmacie.store');

Route::get('/pharmacie/create', [PharmacieController::class, 'create'])->name('pharmacie.create');

Route::get('/pharmacie/{pharmacie}/edit', [PharmacieController::class, 'edit'])->name('pharmacie.edit');

Route::put('/pharmacie/{pharmacie}', [PharmacieController::class, 'update'])->name('pharmacie.update');

Route::delete('/pharmacie/{pharmacie}', [PharmacieController::class, 'destroy'])->name('pharmacie.delete');



Route::get('/categorie', [CategoriePathologieController::class, 'afficher'])->name('categorie.index');
Route::get('/categorie/create', [CategoriePathologieController::class, 'create'])->name('categorie.create');
Route::post('/categorie', [CategoriePathologieController::class, 'store'])->name('categorie.store');
Route::get('/categorie/{categorie}/edit', [CategoriePathologieController::class, 'edit'])->name('categorie.edit');
Route::put('/categorie/{categorie}', [CategoriePathologieController::class, 'update'])->name('categorie.update');
Route::delete('/categorie/{categorie}', [CategoriePathologieController::class, 'destroy'])->name('categorie.delete');



//Route::put('/categorie/{categorie}', [CategoriePathologieController::class, 'update '])->name('categorie.update');

//Route::delete('/categorie/{categorie}', [CategoriePathologieController::class, 'destroy'])->name('categorie.delete');







require __DIR__ . '/auth.php';