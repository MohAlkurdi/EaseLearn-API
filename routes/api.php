<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CertificateController;

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
Route::get("/certificate/{uniqueNumber}", [CertificateController::class, "getCertificate"]);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post("/courses", [CourseController::class, "store"]);
    Route::put("/courses/{id}", [CourseController::class, "update"]);
    Route::delete("/courses/{id}", [CourseController::class, "destroy"]);
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::post('/courses/{id}/enroll', [CertificateController::class, 'enrollCourse']);
    Route::get("/user/courses", [CertificateController::class, "getUserCourses"]);
    Route::get("/user", [AuthController::class, "user"]);
    Route::get("/user/certificates/{memberId}", [CertificateController::class, "getUserCertificates"]);
});
