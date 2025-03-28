<?php

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


//USER TYPES
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\TopDogAuthentication;
use App\Http\Controllers\Auth\TopDogSAuthentication;


//DEFUALT PATHS
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;







// ORDER 

// Login Routes
// USERS 
// API 
// Crud
// certified materials
// not certified materials

//################################################################################################################################################################################################################################
//                                                                                          REMEBER
// POST -> USED TO SEND DATA 
// GET  -> USED TO RETRIEVE DATA
// PUT  -> USED TO UPDATE OR REPLACE A FULL RESOURCE
// PATCH -> USED TO PARTIALLY UPDATE/REPLACE A RECOURCE                                                                                                    
//################################################################################################################################################################################################################################
//################################################################################################################################################################################################################################
//                                                                                    Grettings pages                                       
//################################################################################################################################################################################################################################

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





//################################################################################################################################################################################################################################
// TOP<-                                                                               certified materials views                                       
//################################################################################################################################################################################################################################

Route::get('/myRoutes/certProd/wood', [WoodController::class, 'wood'])->name('myRoutes.certProd.wood');
Route::get('/myRoutes/certProd/metal', [MetalController::class, 'metal'])->name('myRoutes.certProd.metal');
Route::get('/myRoutes/certProd/steel', [SteelController::class, 'steel'])->name('myRoutes.certProd.steel');






//################################################################################################################################################################################################################################
// TOP<-                                                                            not certified materials views                                      
//################################################################################################################################################################################################################################

Route::get('/myRoutes/certProd/Nwood', [NWoodController::class, 'Nwood'])->name('myRoutes.certProd.Nwood');
Route::get('/myRoutes/certProd/Nmetal', [NMetalController::class, 'Nmetal'])->name('myRoutes.certProd.Nmetal');
Route::get('/myRoutes/certProd/Nsteel', [NSteelController::class, 'Nsteel'])->name('myRoutes.certProd.Nsteel');




//################################################################################################################################################################################################################################
// TOP<-                                                                                     Cart crud                                     
//################################################################################################################################################################################################################################

//VIEW
Route::get('/myRoutes/cart', [CartController::class, 'viewCart'])->name('myRoutes.cart');

//CRUD
Route::patch('/cart/{product}/updateQuantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/cart/{product}/add', [CartController::class, 'addToCart'])->name('cart.add');
// Route::get('/myRoutes/cart', [CartController::class, 'update'])->name('myRoutes.update');
// Route::get('/myRoutes/cart', [CartController::class, 'delete'])->name('myRoutes.delete');





//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            Certified Wood Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [WoodController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [WoodController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certifiedWoodProducts}/update', [WoodController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certifiedWoodProducts}/edit', [WoodController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certifiedWoodProducts}', [WoodController::class, 'destroy'])->name('crud.destroy');



//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            Certified Steel Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [SteelController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [SteelController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certifiedWoodProducts}/update', [SteelController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certifiedWoodProducts}/edit', [SteelController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certifiedWoodProducts}', [SteelController::class, 'destroy'])->name('crud.destroy');




//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            Certified Metal Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [MetalController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [MetalController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certifiedWoodProducts}/update', [MetalController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certifiedWoodProducts}/edit', [MetalController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certifiedWoodProducts}', [MetalController::class, 'destroy'])->name('crud.destroy');






//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------







//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            not Certified Wood Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/Ncreate', [NWoodController::class, 'create'])->name('myRoutes.CRUD.Ncreate');
Route::post('/myRoutes/certProd/Nwood', [NWoodController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{notcertifiedWoodProducts}/Nupdate', [NWoodController::class, 'update'])->name('crud.Nupdate');
Route::get('/myRoutes/{notcertifiedWoodProducts}/edit', [NWoodController::class, 'edit'])->name('crud.Nedit');
Route::delete('/myRoutes/{notcertifiedWoodProducts}', [NWoodController::class, 'destroy'])->name('crud.Ndestroy');



//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            not Certified Steel Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [NSteelController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [NSteelController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certifiedWoodProducts}/update', [NSteelController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certifiedWoodProducts}/edit', [NSteelController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certifiedWoodProducts}', [NSteelController::class, 'destroy'])->name('crud.destroy');




//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            not Certified Metal Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [NMetalController::class, 'create'])->name('myRoutes.CRUD.create');
Route::post('/myRoutes/certProd/wood', [NMetalController::class, 'store'])->name('myRoutes.store');
Route::put('/myRoutes/{certifiedWoodProducts}/update', [NMetalController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certifiedWoodProducts}/edit', [NMetalController::class, 'edit'])->name('crud.edit');
Route::delete('/myRoutes/{certifiedWoodProducts}', [NMetalController::class, 'destroy'])->name('crud.destroy');
















//################################################################################################################################################################################################################################
// MIDDLE<-                                                                           Login Routes Admin                                            
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
// BOTTOM<-                                                                           Login Routes supplier                                            
//################################################################################################################################################################################################################################

// GET route for the authentication form
Route::get('/topDogAuthsupplier', [topDogSAuthentication::class, 'theTopDogView'])->name('myRoutes.topDogRoutes.topDogAuthSupplier');

// GET route for the admin page
Route::get('/topDogAdmin', function () {
    return view('myRoutes.topDogRoutes.topDogAuthSupplier');
})->name('myRoutes.topDogRoutes.topDogAuthSupplier');

// POST route for handling the authentication form submission
Route::post('/topDogAdmin', [topDogSAuthentication::class, 'supplierPassword'])->name('myRoutes.topDogRoutes.topDogSupplier.post');



//create admin 
Route::get('/topdogCreateAdmin', [topDogSAuthentication::class, 'suppliertopdogCreate'])->name('topdogSupplierCreate');

Route::post('/STOREtopdogCreateAdmin', [topDogSAuthentication::class, 'suppliertopdogStore'])->name('myRoutes.topdogS Store');


//veiw
Route::get('/myRoutes/supplierUserView', [topDogSAuthentication::class, 'theTopDogView'])->name('myRoutes.topDogRoutes.topDogAuthSupplierView');






//################################################################################################################################################################################################################################
// BOTTOM<-                                                                                  USERS                                              
//################################################################################################################################################################################################################################

//add users later today
Route::get('/myRoutes/adminUserView', [UsersController::class, 'adminUserView'])->name('myRoutes.adminUserView');





//test page view
Route::get('/MainTestPage', [WoodController::class, 'viewTestPage'])->name('MainTestPage');



//################################################################################################################################################################################################################################
// BOTTOM<-                                                                                  API                                               
//################################################################################################################################################################################################################################

Route::get('/myRoutes/work', [ApiController::class, 'work'])->name('myRoutes.work');
























//leave them alone for now...
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
