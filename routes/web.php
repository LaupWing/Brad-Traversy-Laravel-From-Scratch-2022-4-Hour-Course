<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

// All Listing
Route::get("/", [ListingController::class, "index"]);

// Show create Form
Route::get("/listings/create", [ListingController::class, "create"]);

// Store listing data
Route::post("/listings", [ListingController::class, "store"]);

// Show edit form
Route::get("/listings/{listing}/edit", [ListingController::class, "edit"]);

// Show edit form
Route::get("/listings/{listing}", [ListingController::class, "edit"]);

// Show edit form
Route::put("/listings/{listing}", [ListingController::class, "update"]);

// Show edit form
Route::delete("/listings/{listing}", [ListingController::class, "destroy"]);

// Show single listing
Route::get("/listings/{listing}", [ListingController::class, "show"]);

// Show register/create form
Route::get("/register", [UserController::class, "create"]);

// Create new user
Route::post("/users", [UserController::class, "store"]);

// Logout the user
Route::post("/logout", [UserController::class, "logout"]);

// Show login form
Route::get("/login", [UserController::class, "login"]);