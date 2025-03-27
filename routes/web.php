<?php
//################################################################################################################################################################################################################################
//                                                                                       PATHS                                             
//################################################################################################################################################################################################################################


//CERTIFIED
use App\Http\Controllers\ApiController;
use App\Http\Controllers\WoodController;
use App\Http\Controllers\SteelController;
use App\Http\Controllers\MetalController;

//NOT CERTIFIED
use App\Http\Controllers\NWoodController;
use App\Http\Controllers\NSteelController;
use App\Http\Controllers\NMetalController;

//CARTS
use App\Http\Controllers\CartController;


use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\TopDogAuthentication;

//DEFUALT PATHS
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;








//################################################################################################################################################################################################################################
//                                                                                    Grettings pages                                       
//################################################################################################################################################################################################################################




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
//                                                                                 certfied materials views                                       
//################################################################################################################################################################################################################################

Route::get('/myRoutes/certProd/wood', [WoodController::class, 'wood'])->name('myRoutes.certProd.wood');
Route::get('/myRoutes/certProd/metal', [MetalController::class, 'metal'])->name('myRoutes.certProd.metal');
Route::get('/myRoutes/certProd/steel', [SteelController::class, 'steel'])->name('myRoutes.certProd.steel');






//################################################################################################################################################################################################################################
//                                                                                not certfied materials views                                      
//################################################################################################################################################################################################################################

Route::get('/myRoutes/certProd/Nwood', [WoodController::class, 'Nwood'])->name('myRoutes.certProd.Nwood');
Route::get('/myRoutes/certProd/Nmetal', [WoodController::class, 'Nmetal'])->name('myRoutes.certProd.Nmetal');
Route::get('/myRoutes/certProd/Nsteel', [WoodController::class, 'Nsteel'])->name('myRoutes.certProd.Nsteel');




//################################################################################################################################################################################################################################
//                                                                                         Cart crud                                     
//################################################################################################################################################################################################################################



Route::get('/myRoutes/cart', [CartController::class, 'viewCart'])->name('myRoutes.cart');
Route::patch('/cart/{product}/updateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/{product}/add', [CartController::class, 'addToCart'])->name('cart.add');
// Route::get('/myRoutes/cart', [CartController::class, 'update'])->name('myRoutes.update');
// Route::get('/myRoutes/cart', [CartController::class, 'delete'])->name('myRoutes.delete');





//################################################################################################################################################################################################################################
//                                                                                      Certified Wood Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [WoodController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [WoodController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certfiedWoodProducts}/update', [WoodController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certfiedWoodProducts}/edit', [WoodController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certfiedWoodProducts}', [WoodController::class, 'destroy'])->name('crud.destroy');



//################################################################################################################################################################################################################################
//                                                                                       Certified Steel Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [SteelController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [SteelController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certfiedWoodProducts}/update', [SteelController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certfiedWoodProducts}/edit', [SteelController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certfiedWoodProducts}', [SteelController::class, 'destroy'])->name('crud.destroy');




//################################################################################################################################################################################################################################
//                                                                                       Certified Metal Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [MetalController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [MetalController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certfiedWoodProducts}/update', [MetalController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certfiedWoodProducts}/edit', [MetalController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certfiedWoodProducts}', [MetalController::class, 'destroy'])->name('crud.destroy');



//################################################################################################################################################################################################################################
//                                                                                           Carts Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [CartController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [CartController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certfiedWoodProducts}/update', [CartController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certfiedWoodProducts}/edit', [CartController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certfiedWoodProducts}', [CartController::class, 'destroy'])->name('crud.destroy');









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



//create admin 
Route::get('/topdogCreateAdmin', [TopDogAuthentication::class, 'topdogCreate'])->name('topdogCreate');

Route::post('/STOREtopdogCreateAdmin', [TopDogAuthentication::class, 'topdogStore'])->name('myRoutes.topdogStore');


//################################################################################################################################################################################################################################
//                                                                                          USERS                                              
//################################################################################################################################################################################################################################

//add users later today
Route::get('/myRoutes/adminUserView', [UsersController::class, 'adminUserView'])->name('myRoutes.adminUserView');
Route::get('/myRoutes/supplierUserView', [UsersController::class, 'supplierUserView'])->name('myRoutes.supplierUserView');




//test page view
Route::get('/MainTestPage', [WoodController::class, 'viewTestPage'])->name('MainTestPage');



//################################################################################################################################################################################################################################
//                                                                                          API                                               
//################################################################################################################################################################################################################################

Route::get('/myRoutes/work', [ApiController::class, 'work'])->name('myRoutes.work');
























//leave them alone for now...
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
