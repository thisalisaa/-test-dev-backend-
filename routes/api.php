<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;


Route::get('/pets/favorites', [PetController::class, 'sortFavorite']); 
Route::get('/pets/statistics', [PetController::class, 'statistics']);
Route::get('/pets/palindrome', [PetController::class, 'palindrome']);
Route::get('/numbers/even', [PetController::class, 'evenNumbers']);
Route::post('/anagram', [PetController::class, 'anagram']);
Route::post('/json/format', [PetController::class, 'formatJson']);
