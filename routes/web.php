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
    return view('home');
})->name('home');


Route::prefix('flashcards')->group(function () {
    Route::get('{single_flashcard_id}/delete',[FlashcardsController::class,'destroySingle']);

    Route::get('singleflashcard/{single_flashcard_id}/edit',[FlashcardsController::class,'editSingle'])->name('editSingle');
    Route::get('groupflashcard/{group_flashcard_id}/edit',[FlashcardsController::class,'editGroup'])->name('editGroup');

    Route::put('singleflashcard/{single_flashcard_id}',[FlashcardsController::class,'updateSingle'])->name('updateSingle');
    Route::put('groupflashcard/{group_flashcard_id}',[FlashcardsController::class,'updateGroup'])->name('updateGroup');

    Route::get('show/{single_flashcards_id}',[FlashcardsController::class,'show'])->name('showsingleflashcards');

    Route::get('groupflashcards/create',[FlashcardsController::class,'createflashcardgroup']);
    Route::get('singleflashcards/create/{group_flashcard_id}',[FlashcardsController::class,'createflashcardsingle'])->name('createflashcardsingle');
});


Route::post('createflashcardgroup/store',[FlashcardsController::class,'storeGroup'])->name('storeGroup');
Route::post('createflashcardsingle/store/{group_flashcard_id}',[FlashcardsController::class,'storeSingle'])->name('storeSingle');

Route::resource('leaderboard', controller: LeaderboardController::class)->middleware(['auth', 'verified']);
Route::resource('pomodoro', controller: PomodoroController::class)->middleware(['auth', 'verified']);
Route::resource('flashcards', controller: FlashcardsController::class)->middleware(['auth', 'verified']);
Route::resource('revisiontimeline', controller: RevisionTimelineController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('permissions/{id}/delete',[PermissionController::class,'destroy'])->middleware('role:super-admin');
Route::resource('permissions', PermissionController::class)->middleware('role:super-admin');

Route::get('roles/{id}/delete',[RoleController::class,'destroy'])->middleware('role:super-admin');
Route::resource('roles', RoleController::class)->middleware('role:super-admin');

Route::get('roles/{roleid}/addpermission',[RoleController::class,'addPermissionToRole'])->middleware('role:super-admin');
Route::put('roles/{roleid}/addpermission',[RoleController::class,'givePermissionToRole'])->middleware('role:super-admin');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
