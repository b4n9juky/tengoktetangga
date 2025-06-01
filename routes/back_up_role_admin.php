Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
// Route::get('/dashboard/', [DashboardAdminController::class, 'index'])->name('dashboard.admin');
// Route::get('/surveyor/home', [SurveyorController::class, 'index'])->name('surveyor.index');
// Route::get('/surveyors/biodata', [SurveyorController::class, 'form'])->name('surveyors.biodata.form');
// Route::post('/surveyors/biodata', [SurveyorController::class, 'store'])->name('surveyors.biodata.store');
// Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');
// Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');
// Route::post('/survey/storeQuestion', [SurveyController::class, 'storeQuestionSurvey'])->name('survey.storeQuestion');
// Route::get('/survey/create', [SurveyController::class, 'create'])->name('survey.create');
// Route::get('/questions/index', [QuestionController::class, 'index'])->name('questions.index');
// Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
// Route::post('/questions/store', [QuestionController::class, 'store'])->name('questions.store');
// Route::post('/pertanyaan/jawab', [QuestionController::class, 'storeJawaban'])->name('questions.answer');
// kategori survey
Route::get('/tema/', [TemaKuisionerController::class, 'index'])->name('tema.home');
// Route::get('/kategori/create', [KategoriSurveyController::class, 'store'])->name('kategori.create');


// //review

// Route::get('/questions/review', [QuestionController::class, 'review'])->name('questions.review');


// // Kegiatan



// Route::prefix('kegiatan')->group(function () {
// Route::get('/kegiatan/', [KegiatanController::class, 'index'])->name('kegiatan.home');
// Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
// Route::post('/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.simpan');
// Route::get('/kegiatan/{id}/show', [KegiatanController::class, 'show'])->name('kegiatan.show');
// Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
// Route::get('/kegiatan/bentuk', [KegiatanController::class, 'bentukKegiatan'])->name('kegiatan.bentuk');
// Route::post('/kegiatan/bentuksimpan', [KegiatanController::class, 'simpanbentukKegiatan'])->name('kegiatan.simpanBentuk');
// Route::delete('/kegiatan/{id}/delete', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
// Route::post('{id}/approve-pembina', [KegiatanController::class, 'approveByPembina'])->name('kegiatan.approve.pembina');
// Route::post('{id}/approve-koordinator', [KegiatanController::class, 'approveByKoordinator'])->name('kegiatan.approve.koordinator');

// Route::get('{id}/tim', [KegiatanController::class, 'tambahTim'])->name('kegiatan.tim');
// Route::post('{id}/tim', [KegiatanController::class, 'storeTim'])->name('kegiatan.tim.store');

// Route::get('tim/{tim_id}/anggota', [KegiatanController::class, 'tambahAnggotaTim'])->name('kegiatan.tim.anggota');
// Route::post('tim/{tim_id}/anggota', [KegiatanController::class, 'storeAnggotaTim'])->name('kegiatan.tim.anggota.store');
// });
// Route::middleware(['auth', 'role:pembina,koordinator'])->group(function () {
// Route::get('kegiatan/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi.index');

// Route::post('kegiatan/{id}/evaluasi', [EvaluasiController::class, 'store'])->name('evaluasi.store');
// });