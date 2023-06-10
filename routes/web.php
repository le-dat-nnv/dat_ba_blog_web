<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productControllers;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\menuController;

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

Route::get('/Destination', [App\Http\Controllers\HomeController::class, 'Destination']);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboardsx', [App\Http\Controllers\admin::class, 'index'])->name('dashboardsx');


Route::prefix('product')->group(function() {
    Route::get('addproduct' , [App\Http\Controllers\productControllers::class , 'list']);
    Route::delete('deleteProduct/{id?}', [productControllers::class, 'deleteProduct']);
    Route::post('addProduct' , [productControllers::class, 'addProducts']);
    Route::get('listProduct' , [productControllers::class, 'getList']);
    Route::get('editProduct/{id}' , [productControllers::class , 'editProduct']);
    Route::post('updateProduct/{id}' , [productControllers::class , 'updateProduct']);
});



Route::prefix('news')->group(function() {
    Route::get('addNews' , [NewsController::class , 'list']);
    Route::delete('deleteNews/{id}', [NewsController::class, 'deleteNews']);
    Route::get('listNews' , [NewsController::class, 'listNews']);
    Route::get('editNews/{id?}' , [NewsController::class , 'editNews']);
    Route::post('updateNews/{id}' , [NewsController::class , 'updateNews']);
    Route::post('addNew' , [NewsController::class , 'addNew']);
});


Route::prefix('menu')->group(function() {
    Route::get('addMenu' , [menuController::class , 'list']);
    Route::delete('deleteMenu/{id?}', [menuController::class, 'deleteMenus']);
    Route::get('listMenu' , [menuController::class, 'listMenus']);
    Route::get('editMenu/{id?}' , [menuController::class , 'editMenus']);
    Route::post('updateMenu/{id}' , [menuController::class , 'updateMenus']);
    Route::post('addMenus' , [menuController::class , 'addMenus']);
});