<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;


Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/pets', function () {
    return view('pages.pets-page.index');
});

Route::get('/smart-checker', function () {
    return view('pages.smart-checker.index');
});

Route::get('/json-formatter', function () {
    return view('pages.json-formatter.index');
});

Route::get('/api/pets', [PetController::class, 'getAllPets']);
Route::post('/api/pets/add-rino', [PetController::class, 'addRino']);
Route::patch('/api/pets/replace-persia', [PetController::class, 'replacePersia']);
Route::post('/api/pets/reset', [PetController::class, 'resetPets']);
