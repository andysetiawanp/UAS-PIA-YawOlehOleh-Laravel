<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftsController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TransController;
use App\Http\Controllers\GroupsController;
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

Route::get('', [GiftsController::class, 'index']);
Route::get('/gifts/welcome',[GiftsController::class, 'welcome']);
//Route::get('/drinks', [DrinksController::class, 'index']);
//Route::get('/drinks/create', [DrinksController::class, 'create']);
//Route::post('/drinks', [DrinksController::class, 'store']);
//Route::get('/drinks/{id}', [DrinksController::class, 'show']);
//Route::get('/drinks/{id}/edit', [DrinksController::class, 'edit']);
//Route::put('/drinks/{id}', [DrinksController::class, 'update']);
//Route::delete('/drinks/{id}', [DrinksController::class, 'destroy']);

Route::resources([
    'gifts' => GiftsController::class,
    'data' => DataController::class,
    'trans' => TransController::class,
    'groups' => GroupsController::class,
]);
Route::get('/gifts/addmember/{gift}', [GiftsController::class, 'addmember']);
Route::put('/gifts/addmember/{gift}', [GiftsController::class, 'updateaddmember']);
Route::put('/gifts/deleteaddmember/{gift}', [GiftsController::class, 'deleteaddmember']);

Route::get('/groups/addmember/{group}', [GroupsController::class, 'addmember']);
Route::put('/groups/addmember/{group}', [GroupsController::class, 'updateaddmember']);
Route::put('/groups/deleteaddmember/{group}', [GroupsController::class, 'deleteaddmember']);