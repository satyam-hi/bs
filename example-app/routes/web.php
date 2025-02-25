<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlluserController;
use App\Http\Controllers\webConroller;
use App\Models\productModel;
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
    // return view('welcome');
    $products =  productModel::all();
    return view('webindex',compact('products'));
});

Route::get('/register',[AlluserController::class,'index']);
Route::post('/registerAction',[AlluserController::class,'registerAction']);
Route::get('/user-login',[AlluserController::class,'userLogin']);
Route::post('/user-login-Action',[AlluserController::class,'userLoginAction']);
Route::get('/user-log-oute',[AlluserController::class,'userLogout']);


Route::get('/list',[AlluserController::class,'list']);
Route::get('/web',[webConroller::class,'index']);
Route::get('/read',[webConroller::class,'read'])->middleware('userCheck');
Route::post('/buy-action',[webConroller::class,'buyAction'])->middleware('userCheck');
Route::get('/on-bag',[webConroller::class,'onBag'])->middleware('userCheck');


Route::get('/admin-login',[AdminController::class,'adminLogin']);
Route::post('/admin-login-action',[AdminController::class,'adminLoginAction']);
Route::get('/admin-logout',[AdminController::class,'adminLogout']);
Route::get('/admin-dashboard',[AdminController::class,'adminDashoard'])->middleware('AdminCheck');
Route::post('/product-action',[AdminController::class,'addProductAction'])->middleware('AdminCheck');
Route::post('/publication-action',[AdminController::class,'addPublicationAction'])->middleware('AdminCheck');


Route::get('/check',[AdminController::class,'check'])->middleware('AdminCheck');

Route::get('/testapi',[webConroller::class,'testapi']);




