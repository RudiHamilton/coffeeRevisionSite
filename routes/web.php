<?php

use App\Http\Controllers\FlashcardsController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PomodoroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisionTimelineController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('leaderboard', controller: LeaderboardController::class)->middleware(['auth', 'verified']);
Route::resource('pomodoro', controller: PomodoroController::class)->middleware(['auth', 'verified']);
Route::resource('flashcards', controller: FlashcardsController::class)->middleware(['auth', 'verified']);
Route::resource('revisiontimeline', controller: RevisionTimelineController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('permissions/{id}/delete',[PermissionController::class,'destroy'])->middleware('role:super-admin');
Route::resource('permissions', PermissionController::class)->middleware('role:super-admin');

Route::get('roles/{id}/delete',[RoleController::class,'destroy'])->middleware('role:super-admin');
Route::resource('roles', RoleController::class)->middleware('role:super-admin');

Route::get('roles/{roleid}/addpermission',[RoleController::class,'addPermissionToRole']);
Route::put('roles/{roleid}/addpermission',[RoleController::class,'givePermissionToRole']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
