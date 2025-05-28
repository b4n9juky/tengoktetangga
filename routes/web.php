<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyorController;
use App\Http\Controllers\SurveyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/surveyors/biodata', [SurveyorController::class, 'form'])->name('surveyors.biodata.form');
    Route::post('/surveyors/biodata', [SurveyorController::class, 'store'])->name('surveyors.biodata.store');
});

Route::middleware(['auth', 'role:surveyor'])->group(function () {
    Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');
    Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
});




Route::middleware(['auth', 'role:surveyor'])->group(function () {
    Route::get('/pertanyaan/', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/pertanyaan/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/pertanyaan/store', [QuestionController::class, 'store'])->name('questions.store');
});



require __DIR__ . '/auth.php';
