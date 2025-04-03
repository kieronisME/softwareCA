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

Route::middleware(['auth'])->group(function () {



    Route::get('/myRoutes/cart', [CartController::class, 'viewCart'])->name('myRoutes.cart');


    //------------------------------------------------CERTIFIED------------------------------------------------//
    //Wood cart routes
    Route::post('/cart/add/{product}', [CartController::class, 'addWoodToCart'])->name('cart.add.wood');
    Route::delete('/cart/remove/{product}', [CartController::class, 'removeWoodFromCart'])->name('cart.remove');
    Route::patch('/cart/update/{product}', [CartController::class, 'Woodupdate'])->name('cart.update');

    //Metal cart routes
    Route::post('/cart/add/metal/{product}', [CartController::class, 'addMetalToCart'])->name('cart.add.metal');
    Route::delete('/cart/remove/metal/{product}', [CartController::class, 'removeMetalFromCart'])->name('cart.remove.metal');
    Route::patch('/cart/update/metal/{product}', [CartController::class, 'Metalupdate'])->name('cart.update.metal');


    //Steel cart routes
    Route::post('/cart/add/steel/{product}', [CartController::class, 'addSteelToCart'])->name('cart.add.steel');
    Route::delete('/cart/remove/steel/{product}', [CartController::class, 'removeSteelFromCart'])->name('cart.remove.steel');
    Route::patch('/cart/update/steel/{product}', [CartController::class, 'Steelupdate'])->name('cart.update.steel');



    //----------------------------------------------NOT CERTIFIED----------------------------------------------//

    //Not Certified Wood cart routes
    Route::post('/cart/Nadd/{product}', [CartController::class, 'addNWoodToCart'])->name('cart.add.Nwood');
    Route::delete('/cart/Nremove/{notCertWoodproduct}', [CartController::class, 'removeNWoodFromCart'])->name('cart.Nremove');
    Route::patch('/cart/Nupdate/{notCertWoodproduct}', [CartController::class, 'Nupdate'])->name('cart.Nupdate');



    //Not Certified Metal cart routes
    Route::post('/cart/NMadd/{product}', [CartController::class, 'addNMetalToCart'])->name('cart.add.Nmetal');
    Route::delete('/cart/metalremove/{notCertMetalproduct}', [CartController::class, 'removeNMetalFromCart'])->name('cart.NMetalremove');
    Route::patch('/cart/Nupdate/{notCertMetalproduct}', [CartController::class, 'NMetalupdate'])->name('cart.NMetalupdate');



    //Not Certified Steel cart routes
    Route::post('/cart/NSadd/{product}', [CartController::class, 'addNSteelToCart'])->name('cart.add.Nsteel');
    Route::delete('/cart/NSteelremove/{notCertSteelproduct}', [CartController::class, 'removeNSteelFromCart'])->name('cart.NSteelremove');
    Route::patch('/cart/Nupdate/{notCertSteelproduct}', [CartController::class, 'NSteelupdate'])->name('cart.NSteelupdate');
});










//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            Certified Wood Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/create', [WoodController::class, 'create'])->name('myRoutes.CertifiedWoodCRUD.create');
Route::post('/myRoutes/certProd/wood', [WoodController::class, 'store'])->name('myRoutes.Woodstore');
Route::put('/myRoutes/{certifiedWoodProducts}/update', [WoodController::class, 'update'])->name('crud.update');
Route::get('/myRoutes/{certifiedWoodProducts}/edit', [WoodController::class, 'edit'])->name('crud.Woodedit');

Route::delete('/myRoutes/{certifiedWoodProducts}', [WoodController::class, 'destroy'])->name('crud.Wooddestroy');





//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            Certified Metal Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/Metalcreate', [MetalController::class, 'create'])->name('myRoutes.CertifiedMetalCRUD.create');
Route::post('/store/certProd/Metal', [MetalController::class, 'store'])->name('myRoutes.Metalstore');
Route::put('/update/{certifiedMetalProducts}/update', [MetalController::class, 'update'])->name('crud.Metalupdate');
Route::get('/edit/{certifiedMetalProducts}/edit', [MetalController::class, 'edit'])->name('crud.Metaledit');

Route::delete('/delete/{certifiedMetalProducts}', [MetalController::class, 'destroy'])->name('crud.Metaldestroy');



//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            Certified Steel Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/Steelcreate', [SteelController::class, 'create'])->name('myRoutes.CertifiedSteelCRUD.create');
Route::post('/myRoutes/certProd/Steel', [SteelController::class, 'store'])->name('myRoutes.Steelstore');
Route::put('/myRoutes/{certifiedSteelProducts}/update', [SteelController::class, 'update'])->name('crud.Steelupdate');
Route::get('/myRoutes/{certifiedSteelProducts}/edit', [SteelController::class, 'edit'])->name('crud.Steeledit');
Route::delete('/myRoutes/{certifiedSteelProducts}', [SteelController::class, 'destroy'])->name('crud.Steeldestroy');








//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------







//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            not Certified Wood Crud                                              
//################################################################################################################################################################################################################################

Route::get('/myRoutes/CRUD/Ncreate', [NWoodController::class, 'create'])->name('myRoutes.NotCertifiedWoodCRUD.create');
Route::post('/myRoutes/certProd/Nwood', [NWoodController::class, 'store'])->name('myRoutes.NWoodstore');




Route::put('/myRoutes/{notCertfiedWoodProducts}/Nupdate', [NWoodController::class, 'update'])->name('crud.Nupdate');





Route::get('/MmyRoutes/{notCertfiedWoodProducts}/edit', [NWoodController::class, 'edit'])->name('crud.NWoodedit');
Route::delete('/Notcertdelete/{notCertfiedWoodProducts}', [NWoodController::class, 'Ndestroy'])->name('pleasDelete');





//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            not Certified Metal Crud                                              
//################################################################################################################################################################################################################################


Route::get('/myRoutes/CRUD/MetalNcreate', [NMetalController::class, 'create'])->name('myRoutes.NotCertifiedMetalCRUD.create');
Route::post('/myRoutes/certProd/Nmetal', [NMetalController::class, 'store'])->name('myRoutes.NMetalstore');
Route::put('/myRoutes/{notCertfiedMetalProducts}/NMetalupdate', [NMetalController::class, 'update'])->name('crud.NMetalupdate');
Route::get('/MetalmyRoutes/{notCertfiedMetalProducts}/edit', [NMetalController::class, 'edit'])->name('crud.NMetaledit');
Route::delete('/NotcertMetaldelete/{notCertfiedMetalProducts}', [NMetalController::class, 'Ndestroy'])->name('MetalPleasDelete');



//################################################################################################################################################################################################################################
// MIDDLE<-                                                                            not Certified Steel Crud                                              
//################################################################################################################################################################################################################################


Route::get('/myRoutes/CRUD/SteelNcreate', [NSteelController::class, 'create'])->name('myRoutes.NotCertifiedSteelCRUD.create');
Route::post('/myRoutes/certProd/Nsteel', [NSteelController::class, 'store'])->name('myRoutes.NSteelstore');
Route::put('/pleasework/{notCertfiedSteelProducts}/NSteelupdate', [NSteelController::class, 'update'])->name('crud.NSteelupdate');
Route::get('/notSteelmyRoutes/{notCertfiedSteelProducts}/edit', [NSteelController::class, 'edit'])->name('crud.NSteeledit');
Route::delete('/NotcertSteeldelete/{notCertfiedSteelProducts}', [NSteelController::class, 'Ndestroy'])->name('SteelPleasDelete');




















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
