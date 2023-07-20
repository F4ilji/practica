<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\OlympiadController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/{id}', [\App\Http\Controllers\OlympiadController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.show');
Route::post('/application', [\App\Http\Controllers\ApplicationController::class, 'store'])->middleware(['auth', 'verified'])->name('application.store');
Route::delete('/application/{application}', [\App\Http\Controllers\ApplicationController::class, 'delete'])->middleware(['auth'])->name('application.delete');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/olympiad/create', [\App\Http\Controllers\OlympiadController::class, 'create'])->name('olympiad.create');
    Route::post('/admin/olympiad/', [\App\Http\Controllers\OlympiadController::class, 'store'])->name('olympiad.store');
    Route::get('/admin/olympiad/{olympiad}/check-applications/', [\App\Http\Controllers\OlympiadController::class, 'checkApplications'])->name('olympiad.check-applications');

    Route::patch('/admin/olympiad/{olympiad}/check-applications/{application}/accept', [\App\Http\Controllers\ApplicationController::class, 'acceptApplication'])->name('application.accept');
    Route::patch('/admin/olympiad/{olympiad}/check-applications/{application}/denied', [\App\Http\Controllers\ApplicationController::class, 'deniedApplication'])->name('application.denied');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/my-applications/', [ProfileController::class, 'myApplications'])->name('profile.indexApplications');

});

require __DIR__.'/auth.php';
