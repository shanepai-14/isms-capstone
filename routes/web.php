<?php

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

Route::get('/',[UserController::class,'index']);
Route::get('/register',[UserController::class,'register']);
Route::get('/forgot',[UserController::class,'forgot']);
Route::get('/reset',[UserController::class,'reset']);

Route::post('/register', [UserController::class, 'registerUser'])->name('auth.register');
Route::post('/login', [UserController::class, 'loginUser'])->name('auth.login');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

});

Route::group(['middleware' => ['auth', 'role:student']], function () {
    Route::get('/dashboard', [StudentController::class, 'studentDashboard'])->name('student.dashboard');
});
