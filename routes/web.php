<?php

use App\Http\Controllers\KategoriSurveyController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyorController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\User\DashboardUser;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\TemaKuisionerController;
use App\Http\Controllers\User\ObervasiContoller;

Route::get('/', function () {
    return view('beranda');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:pelaksana'])->group(function () {
    Route::get('/dashboard/user', [DashboardUser::class, 'index'])->name('dashboard.user');
    Route::get('/surveyors/biodata', [SurveyorController::class, 'form'])->name('surveyors.biodata.form');
    Route::post('/surveyors/biodata', [SurveyorController::class, 'store'])->name('surveyors.biodata.store');


    Route::get('/surveyor/edit', [SurveyorController::class, 'edit'])->name('biodata.edit');
    Route::post('/surveyor/update', [SurveyorController::class, 'update'])->name('biodata.update');

    // Route::get('/questions/start', [QuestionController::class, 'index'])->name('questions.index');

    Route::get('/answer/index', [AnswerController::class, 'index'])->name('answer.index');
    Route::post('/answer/store', [AnswerController::class, 'store'])->name('answer.store');
    Route::get('/answer/review', [AnswerController::class, 'review'])->name('answer.review');
    Route::get('/answer/indexes', [AnswerController::class, 'indexKuisioner'])->name('answer.indexKuisioner');
    // Route::get('/kuisioner/show', [AnswerController::class, 'indexKuisioner'])->name('kuisioner.show');

    // Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
    // Route::post('/questions/answer', [QuestionController::class, 'storeJawaban'])->name('questions.answer');
    // Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    // Route::post('/questions/{id}/update', [QuestionController::class, 'update'])->name('questions.update');



    // Route::get('/questions/review', [QuestionController::class, 'review'])->name('questions.review');


    Route::get('/answer/{id}/edit', [AnswerController::class, 'edit'])->name('answer.edit');
    Route::post('/answer/{id}/update', [AnswerController::class, 'update'])->name('answer.update');
    Route::get('/observasi', [ObervasiContoller::class, 'index'])->name('observasi.index');
    Route::get('/observasi/create', [ObervasiContoller::class, 'create'])->name('observasi.create');
    Route::post('/observasi/store', [ObervasiContoller::class, 'store'])->name('observasi.store');
    Route::get('/observasi/{id}/edit', [ObervasiContoller::class, 'edit'])->name('observasi.edit');
    Route::post('/observasi/{id}/update', [ObervasiContoller::class, 'update'])->name('observasi.update');
    Route::get('/observasi/{id}/image', [ObervasiContoller::class, 'showForm'])->name('observasi.showform');
    Route::post('/observasi/{id}/upload', [ObervasiContoller::class, 'uploadPhoto'])->name('observasi.imageUpload');
    Route::delete('/observasi/{id}/destroy', [ObervasiContoller::class, 'destroy'])->name('observasi.destroy');


    Route::get('/kegiatan/', [KegiatanController::class, 'index'])->name('kegiatan.home');
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.simpan');
    Route::get('/kegiatan/{id}/show', [KegiatanController::class, 'show'])->name('kegiatan.show');
    Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::get('/kegiatan/bentuk', [KegiatanController::class, 'bentukKegiatan'])->name('kegiatan.bentuk');
    Route::post('/kegiatan/bentuksimpan', [KegiatanController::class, 'simpanbentukKegiatan'])->name('kegiatan.simpanBentuk');
    Route::delete('/kegiatan/{id}/delete', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dashboard/', [DashboardAdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/surveyor/home', [SurveyorController::class, 'index'])->name('surveyor.index');
    Route::get('/surveyors/biodata', [SurveyorController::class, 'form'])->name('surveyors.biodata.form');
    Route::post('/surveyors/biodata', [SurveyorController::class, 'store'])->name('surveyors.biodata.store');
    Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');
    Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');
    Route::post('/survey/storeQuestion', [SurveyController::class, 'storeQuestionSurvey'])->name('survey.storeQuestion');
    Route::get('/survey/create', [SurveyController::class, 'create'])->name('survey.create');
    Route::get('/questions/index', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
    Route::post('/pertanyaan/jawab', [QuestionController::class, 'storeJawaban'])->name('questions.answer');
    // kategori survey
    Route::get('/tema/', [TemaKuisionerController::class, 'index'])->name('tema.home');
    // Route::get('/kategori/create', [KategoriSurveyController::class, 'store'])->name('kategori.create');


    //     //review

    //     Route::get('/questions/review', [QuestionController::class, 'review'])->name('questions.review');


    //     // Kegiatan 



    // Route::prefix('kegiatan')->group(function () {
    //     Route::get('/kegiatan/', [KegiatanController::class, 'index'])->name('kegiatan.home');
    //     Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    //     Route::post('/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.simpan');
    //     Route::get('/kegiatan/{id}/show', [KegiatanController::class, 'show'])->name('kegiatan.show');
    //     Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    //     Route::get('/kegiatan/bentuk', [KegiatanController::class, 'bentukKegiatan'])->name('kegiatan.bentuk');
    //     Route::post('/kegiatan/bentuksimpan', [KegiatanController::class, 'simpanbentukKegiatan'])->name('kegiatan.simpanBentuk');
    //     Route::delete('/kegiatan/{id}/delete', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
    //     Route::post('{id}/approve-pembina', [KegiatanController::class, 'approveByPembina'])->name('kegiatan.approve.pembina');
    //     Route::post('{id}/approve-koordinator', [KegiatanController::class, 'approveByKoordinator'])->name('kegiatan.approve.koordinator');

    //     Route::get('{id}/tim', [KegiatanController::class, 'tambahTim'])->name('kegiatan.tim');
    //     Route::post('{id}/tim', [KegiatanController::class, 'storeTim'])->name('kegiatan.tim.store');

    //     Route::get('tim/{tim_id}/anggota', [KegiatanController::class, 'tambahAnggotaTim'])->name('kegiatan.tim.anggota');
    //     Route::post('tim/{tim_id}/anggota', [KegiatanController::class, 'storeAnggotaTim'])->name('kegiatan.tim.anggota.store');
    // });
    // Route::middleware(['auth', 'role:pembina,koordinator'])->group(function () {
    //     Route::get('kegiatan/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi.index');

    //     Route::post('kegiatan/{id}/evaluasi', [EvaluasiController::class, 'store'])->name('evaluasi.store');
    // });
});





require __DIR__ . '/auth.php';
