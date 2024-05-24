<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PetsApiController;

Route::get('/pets', [PetsApiController::class, 'getList']);
Route::post('/pets', [PetsApiController::class, 'add']);
Route::get('/pets/{id}', [PetsApiController::class, 'getOne']);
Route::patch('/pets/{id}', [PetsApiController::class, 'edit']);
Route::delete('/pets/{id}', [PetsApiController::class, 'delete']);


// Route::prefix('/pets')
//     ->controller(PetsApiController::class)
//     ->group(function () {
//         Route::get('/', 'getList');
//         Route::get('/{id}', 'getOne');
//         Route::post('/', 'add');
//         Route::patch('/{id}', 'edit');
//         Route::delete('/{id}', 'delete');
//     });