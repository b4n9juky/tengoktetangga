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



Route::middleware(['auth', 'verified', 'role:pelaksana'])->group(function () {
    Route::get('/dashboard/user', [DashboardUser::class, 'index'])->name('dashboard.user');
    Route::get('/surveyors/create', [SurveyorController::class, 'create'])->name('surveyors.create');
    Route::post('/surveyors/store', [SurveyorController::class, 'store'])->name('surveyors.store');


    Route::get('/surveyor/edit', [SurveyorController::class, 'edit'])->name('biodata.edit');
    Route::post('/surveyor/update', [SurveyorController::class, 'update'])->name('biodata.update');

    // Route::get('/questions/start', [QuestionController::class, 'index'])->name('questions.index');

    Route::get('/answer/{id}/index', [AnswerController::class, 'index'])->name('answer.index');
    Route::get('/answer/home', [AnswerController::class, 'home'])->name('answer.home');
    Route::post('/answer/store', [AnswerController::class, 'store'])->name('answer.store');
    Route::get('/answer/{id}/review', [AnswerController::class, 'review'])->name('answer.review');
    Route::get('/answer/indexes', [AnswerController::class, 'indexKuisioner'])->name('answer.indexKuisioner');
    // Route::get('/kuisioner/show', [AnswerController::class, 'indexKuisioner'])->name('kuisioner.show');
    Route::get('/tema/{id}/answers', [AnswerController::class, 'answersByTema'])->name('tema.answers');
    Route::get('/questioner/indexList', [QuestionController::class, 'indexList'])->name('questioners.indexList');
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





// dashboard admin//



Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [DashboardAdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/questions/index', [QuestionController::class, 'index'])->name('questions.index');
    // Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    // Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');

    //state form pertanyaan
    Route::get('/tema/{tema}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/tema/{tema}/questions', [QuestionController::class, 'store'])->name('questions.store');




    // tema kuisioner
    Route::get('/tema/', [TemaKuisionerController::class, 'index'])->name('tema');
    Route::get('/tema/create', [TemaKuisionerController::class, 'create'])->name('tema.create');
    Route::post('/tema/store', [TemaKuisionerController::class, 'store'])->name('tema.store');
    Route::get('/tema/{id}/edit', [TemaKuisionerController::class, 'edit'])->name('tema.edit');
    Route::post('/tema/{id}/edit', [TemaKuisionerController::class, 'update'])->name('tema.update');
    Route::delete('/tema/{id}/delete', [TemaKuisionerController::class, 'destroy'])->name('tema.destroy');
    Route::get('/tema/{id}/showquestions', [TemaKuisionerController::class, 'showQuestions'])->name('tema.showQuestions');
    Route::get('/tema/{id}/showdetails', [TemaKuisionerController::class, 'showDetails'])->name('tema.showDetails');

    // observasi
    Route::get('/admin/observasi/', [ObervasiContoller::class, 'getData'])->name('admin.observasi');
    Route::get('/dokumentasi/{id}', [ObervasiContoller::class, 'getDetail'])->name('admin.observasiDetail');


    Route::get('/surveyor/home', [SurveyorController::class, 'index'])->name('surveyor.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});







require __DIR__ . '/auth.php';
