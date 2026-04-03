<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\ClassifiedAdController;
use App\Http\Controllers\EpaperController;
use App\Http\Controllers\ContactRequestController;



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


/*-------for website---------*/



Route::get('/',[Home::class,'index']);
Route::get('/epaper',[Home::class,'epaper']);
Route::post('/contact-submit', [ContactRequestController::class,'store'])->name('contact.submit');

Route::get('/login',function(){
    return view('website.login');
})->name('user.login');


Route::post('/login-submit', [Home::class, 'login'])->name('login.submit');
Route::get('/register',function(){
    return view('website.register');
});
Route::post('/register-submit', [Home::class, 'register'])->name('register.submit');




Route::get('/adpreview',[Home::class, 'adpreview']);  
Route::post('/classified-ad-store', [ClassifiedAdController::class, 'store'])->name('classified.store');


Route::middleware('auth')->group(function(){
Route::get('/dashboard',[Home::class, 'dashboard'])->name('user.dashboard'); 
Route::get('/orders', [Home::class, 'userOrders'])->name('user.orders');
});


Route::post('/logout-user', [Home::class, 'logout'])->middleware('auth')->name('user.logout');

/*-------end website---------*/


/*-------for admin---------*/

Route::get('/admin/login',function(){
    return view('admin.login');
});

Route::post('/admin/login',[Register::class, 'login'])->name('admin.login');


Route::middleware('auth')->group(function(){
    Route::get('/admin/dashboard',function(){
    return view('admin.dashboard');
});

route::get('/admin/adlist',[Dashboard::class,'adlist']);
Route::get('/admin/ad-view/{id}',[Dashboard::class,'view'])->name('admin.ads.view');
Route::delete('/admin/ad-delete/{id}',[Dashboard::class,'delete'])->name('admin.ads.delete');
Route::get('/admin/users',[Dashboard::class,'users'])->name('admin.users');
Route::get('admin/epaper', [EpaperController::class, 'index'])->name('admin.epaper.list');
Route::post('admin/epaper/store', [EpaperController::class, 'store'])->name('admin.epaper.store');
Route::post('admin/epaper/store', [EpaperController::class, 'store'])->name('admin.epaper.store');
Route::get('/admin/contact-requests', [ContactRequestController::class,'index'])->name('admin.contact.requests');



});


route::post('/logout',[Register::class, 'logout']);


/*-------end admin---------*/

