<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Auth routes
Route::post("/register", [AuthController::class, 'register']);
Route::post("/login", [AuthController::class, "login"]);


// Public routes
Route::get("/courses", [CourseController::class, "index"]);
Route::get("/courses/{id}", [CourseController::class, "show"]);
Route::get("/courses/search/{name}", [CourseController::class, "search"]);

// Protected routes
Route::post("/courses", [CourseController::class, "store"])->middleware('auth:sanctum');
Route::put("/courses/{id}", [CourseController::class, "update"])->middleware('auth:sanctum');
Route::delete("/courses/{id}", [CourseController::class, "destroy"])->middleware('auth:sanctum');
Route::post("/logout", [AuthController::class, "logout"])->middleware('auth:sanctum');
