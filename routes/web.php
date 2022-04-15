<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\StatesController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\ DepartmentController;
use App\Http\Controllers\API\ChangePasswordController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('countries', CountryController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('states', StatesController::class);
Route::resource('cities', CityController::class);
Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');


Route::get('{any}', function() {
    return view('employees.index');
})->where('any', '.*');