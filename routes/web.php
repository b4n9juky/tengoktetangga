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
use App\Http\Controllers\KondisiController;
use App\Http\Controllers\TemaKuisionerController;

use App\Http\Controllers\SkorController;
use App\Http\Controllers\User\ObservasiController;

Route::get('/', function () {
    return view('beranda');
});
Route::get('/pengantar', function () {
    return view('pengantar');
});
Route::get('/prolog', function () {
    return view('prolog');
});




Route::middleware(['auth', 'verified', 'role:pelaksana'])->group(function () {
    Route::get('/dashboard/user', [DashboardUser::class, 'index'])->name('dashboard.user');
    Route::get('/dashboard/cek', [DashboardUser::class, 'cekResponden']);
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
    Route::get('/observasi', [ObservasiController::class, 'index'])->name('observasi.index');
    Route::get('/observasi/create', [ObservasiController::class, 'create'])->name('observasi.create');
    Route::post('/observasi/store', [ObservasiController::class, 'store'])->name('observasi.store');
    Route::get('/observasi/{id}/edit', [ObservasiController::class, 'edit'])->name('observasi.edit');
    Route::post('/observasi/{id}/update', [ObservasiController::class, 'update'])->name('observasi.update');
    Route::get('/observasi/{id}/image', [ObservasiController::class, 'showForm'])->name('observasi.showform');
    Route::post('/observasi/{id}/upload', [ObservasiController::class, 'uploadPhoto'])->name('observasi.imageUpload');
    Route::delete('/observasi/{id}/deletefoto', [ObservasiController::class, 'destroyPhoto'])->name('observasi.destroyPhoto');
    Route::delete('/observasi/{id}/destroy', [ObservasiController::class, 'destroy'])->name('observasi.destroy');


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

    // update questions 
    Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::post('/questions/{id}/update', [QuestionController::class, 'update'])->name('questions.update');

    // observasi
    Route::get('/admin/observasi/', [ObservasiController::class, 'getData'])->name('admin.observasi');
    Route::get('/dokumentasi/{id}', [ObservasiController::class, 'getDetail'])->name('admin.observasiDetail');
    Route::get('/admin/hasilobservasi', [ObservasiController::class, 'hasilObservasi'])->name('admin.hasilobservasi');
    Route::get('/admin/grafikobservasi', [ObservasiController::class, 'grafik'])->name('admin.grafikobservasi');
    Route::delete('admin/observasi/{id}/destroy', [ObservasiController::class, 'destroyAdmin'])->name('observasi.destroyAdmin');
    Route::get('admin/{id}/showdata', [ObservasiController::class, 'showDataTetangga'])->name('showtetangga');

    // kondisi teramati
    Route::get('/kondisi', [KondisiController::class, 'index'])->name('kondisi.index');
    Route::get('/kondisi/create', [KondisiController::class, 'create'])->name('kondisi.create');
    Route::get('/kondisi/{id}/edit', [KondisiController::class, 'edit'])->name('kondisi.edit');
    Route::post('/kondisi/store', [KondisiController::class, 'store'])->name('kondisi.store');
    Route::post('/kondisi/{id}/update', [KondisiController::class, 'update'])->name('kondisi.update');
    Route::delete('/kondisi/{id}/delete', [KondisiController::class, 'destroy'])->name('kondisi.destroy');
    //rentang skor hasil kuisioner
    Route::get('/skor', [SkorController::class, 'index'])->name('skor.index');
    Route::get('/skor/create', [SkorController::class, 'create'])->name('skor.create');
    Route::post('/skor/store', [SkorController::class, 'store'])->name('skor.store');
    Route::get('/skor/{id}/edit', [SkorController::class, 'edit'])->name('skor.edit');
    Route::post('/skor/{id}/update', [SkorController::class, 'update'])->name('skor.update');
    Route::delete('/skor/{id}/delete', [SkorController::class, 'destroy'])->name('skor.destroy');


    Route::get('/responden', [SurveyorController::class, 'index'])->name('surveyor.index');
    Route::get('/responden/{id}/edit', [SurveyorController::class, 'getIndex'])->name('surveyor.getIndex');
    Route::delete('/responden/{id}/delete', [SurveyorController::class, 'destroy'])->name('surveyor.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});







require __DIR__ . '/auth.php';
