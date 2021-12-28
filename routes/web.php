<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/99', function (){
    $ad = \App\Models\Admin::find(1);
    dd($ad->vaccines);
});

Route::get('/',[\App\Http\Controllers\BaseController::class, 'index'])->name('welcome');
Route::get('/doctors',[\App\Http\Controllers\BaseController::class, 'doctors'])->name('doctors');
Route::middleware(['auth:web'])->get('/doctor/{id}',[\App\Http\Controllers\BaseController::class, 'view_doctor'])->name('view_doctor');
Route::middleware(['auth:web'])->post('/doctor/{id}',[\App\Http\Controllers\BaseController::class, 'make_appoint'])->name('make_appoint');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.loginForm');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/register', [App\Http\Controllers\AdminController::class, 'signUp'])->name('admin.register');
Route::post('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');


Route::group(['prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => ['auth:admin']], function (){
    Route::get('/home', [\App\Http\Controllers\DashboardController::class, 'index'])->name('home');


    Route::group(['prefix' => 'appoints' , 'as' => 'appoints.'], function (){
        Route::get('/', [\App\Http\Controllers\AppointController::class, 'index'])->name('home');
        Route::post('/{user}/{vaccine}', [\App\Http\Controllers\AppointController::class, 'done_user'])->name('done-user');

    });

    Route::group(['prefix' => 'doctors' , 'as' => 'doctors.'], function (){
        Route::get('/', [\App\Http\Controllers\DoctorsController::class, 'index'])->name('home');

    });

    Route::group(['prefix' => 'vaccines' , 'as' => 'vaccines.'], function (){
        Route::get('/', [\App\Http\Controllers\VaccineController::class, 'index'])->name('home');
        Route::post('/{vaccine}', [\App\Http\Controllers\VaccineController::class, 'delete_vaccine'])->name('delete_vaccine');

    });
    Route::group(['prefix' => 'children' , 'as' => 'children.'], function (){
        Route::get('/', [\App\Http\Controllers\ChildrenController::class, 'index'])->name('home');

    });

});
