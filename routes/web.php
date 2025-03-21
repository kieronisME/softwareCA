<?php

//MY PATHS
use App\Http\Controllers\ApiController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UsersController;

//DEFUALT PATHS
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Crud
Route::get('/myRoutes/CRUD/create', [MaterialController::class, 'create'])->name('myRoutes.CRUD.create'); 
Route::post('/myRoutes/certProd/wood', [MaterialController::class, 'store'])->name('myRoutes.store');
Route::delete('/myRoutes/{certfiedWoodProducts}', [MaterialController::class, 'destroy'])->name('crud.destroy');



//api
Route::get('/myRoutes/work', [ApiController::class, 'work'])->name('myRoutes.work');

//users
Route::get('/myRoutes/adminUserView', [UsersController::class, 'adminUserView'])->name('myRoutes.adminUserView');
Route::get('/myRoutes/supplierUserView', [UsersController::class, 'supplierUserView'])->name('myRoutes.supplierUserView');



//certfied materials 
Route::get('/myRoutes/certProd/wood', [MaterialController::class, 'wood'])->name('myRoutes.certProd.wood');
Route::get('/myRoutes/certProd/metal', [MaterialController::class, 'metal'])->name('myRoutes.certProd.metal');
Route::get('/myRoutes/certProd/steel', [MaterialController::class, 'steel'])->name('myRoutes.certProd.steel');


// not certfied materials 
Route::get('/myRoutes/certProd/Nwood', [MaterialController::class, 'Nwood'])->name('myRoutes.certProd.Nwood');
Route::get('/myRoutes/certProd/Nmetal', [MaterialController::class, 'Nmetal'])->name('myRoutes.certProd.Nmetal');
Route::get('/myRoutes/certProd/Nsteel', [MaterialController::class, 'Nsteel'])->name('myRoutes.certProd.Nsteel');


//leave them alone for now...
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
