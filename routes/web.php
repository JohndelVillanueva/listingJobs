<?php

use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------

// Common Resource Routes:
// index - Show all listings
// show - Show a single listing
// create - Create a new listing
// store - Store a new listing
// edit - Edit an existing listing
// update - Update an existing listing
// destroy - Delete an existing listing


// listingController - ListingController


//  all listing
Route::get('/', [ListingController::class, 'index']);
// show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// store listing information
Route::post('/listings' , [ListingController::class, 'store'])->middleware('auth');
// show edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// update listing information
Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// destroy listing information
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
// manage listing information
Route::get('/listings/manage', [ListingController::class,'manage'])->middleware('auth');
//  Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->middleware('guest');


// userController methods
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);
// logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//manage listings


