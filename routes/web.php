<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () { 
    return 'Acerca de nosotros'; 
    });

    //Route::get('/user/{id}', function ($id) { 
      //  return 'ID de usuario: ' . $id; 
        //});

        
        Route::get('/contacto', function () { 
        return 'Página de contacto'; 
        })->name('contacto');


        Route::get('/user/{id}', function ($id) {
            return 'ID de usuario: ' . $id;
           })->where('id', '[0-9]{4}');

           Route::prefix('admin')->group(function () { 
            Route::get('/', function () { 
            return 'Panel de administración'; 
            }); 
            Route::get('/users', function () { 
            return 'Lista de usuarios'; 
            }); 
            }); 
           
Auth::routes();

Route ::group(['middleware' => ['auth'] ],function(){

    //PANEL DE CONTROL

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //PRODUCTOS
    Route::resource('product', ProductController::class);
    Route::resource('customer',CustomerController::class);
    Route::resource('order', OrderController::class);
    Route::get('cambioestadoproduct', [ProductController::class, 'cambioestadoproduct'])->name('cambioestadoproduct');
}); 

