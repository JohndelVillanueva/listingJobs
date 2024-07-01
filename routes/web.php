<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\listing;

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


//  all listing
Route::get('/', [ListingController::class, 'index']);
// show create form

Route::get('/listings/create', [ListingController::class, 'create']);
// store listing information

Route::post('/listings' , [ListingController::class, 'store']);
// show edit Form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
// update listing information

Route::put('listings/{listing}', [ListingController::class, 'update']);

// destroy listing information

Route::delete('listings/{listing}', [ListingController::class, 'destroy']);
//  Single listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);
