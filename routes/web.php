<?php

//MY PATHS
use App\Http\Controllers\ApiController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\TopDogAuthentication;

//DEFUALT PATHS
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ORDER 

// Login Routes
// USERS 
// API 
// Crud
// certfied materials
// not certfied materials

//################################################################################################################################################################################################################################
//                                                                                          REMEBER
// POST -> USED TO SEND DATA 
// GET  -> USED TO RETRIEVE DATA
// PUT  -> USED TO UPDATE OR REPLACE A FULL RESOURCE
// PATCH -> USED TO PARTIALLY UPDATE/REPLACE A RECOURCE                                                                                                    
//################################################################################################################################################################################################################################
//################################################################################################################################################################################################################################
//                                                                                       Login Routes                                             
//################################################################################################################################################################################################################################

// GET route for the authentication form
Route::get('/topDogAuth', [TopDogAuthentication::class, 'theTopDogView'])->name('myRoutes.topDogRoutes.topDogAuth');

// GET route for the admin page
Route::get('/topDogAdmin', function () {
    return view('myRoutes.topDogRoutes.topDogAdmin');
})->name('myRoutes.topDogRoutes.topDogAdmin');

// POST route for handling the authentication form submission
Route::post('/topDogAdmin', [TopDogAuthentication::class, 'adminPassword'])->name('myRoutes.topDogRoutes.topDogAdmin.post');



//################################################################################################################################################################################################################################
//                                                                                          USERS                                              
//################################################################################################################################################################################################################################


//add users later today
Route::get('/myRoutes/adminUserView', [UsersController::class, 'adminUserView'])->name('myRoutes.adminUserView');
Route::get('/myRoutes/supplierUserView', [UsersController::class, 'supplierUserView'])->name('myRoutes.supplierUserView');








//################################################################################################################################################################################################################################
//                                                                                          API                                               
//################################################################################################################################################################################################################################

Route::get('/myRoutes/work', [ApiController::class, 'work'])->name('myRoutes.work');







//################################################################################################################################################################################################################################
//                                                                                       Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [MaterialController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [MaterialController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certfiedWoodProducts}/update', [MaterialController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certfiedWoodProducts}/edit', [MaterialController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certfiedWoodProducts}', [MaterialController::class, 'destroy'])->name('crud.destroy');










//################################################################################################################################################################################################################################
//                                                                                 certfied materials                                       
//################################################################################################################################################################################################################################

Route::get('/myRoutes/certProd/wood', [MaterialController::class, 'wood'])->name('myRoutes.certProd.wood');
Route::get('/myRoutes/certProd/metal', [MaterialController::class, 'metal'])->name('myRoutes.certProd.metal');
Route::get('/myRoutes/certProd/steel', [MaterialController::class, 'steel'])->name('myRoutes.certProd.steel');









//################################################################################################################################################################################################################################
//                                                                              not certfied materials                                       
//################################################################################################################################################################################################################################

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
