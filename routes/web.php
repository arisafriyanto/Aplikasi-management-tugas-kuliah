<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Auth::routes();

Route::get('/', 'HomeController')->name('home')->middleware('auth');

Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('{user:id}', 'AccountController@account')->name('account');
    Route::patch('{user:id}/edit', 'AccountController@account_edit')->name('account.edit');
});

Route::prefix('users')->middleware('auth', 'role:admin')->group(function () {
    Route::get('', 'UserController@users')->name('users');
    Route::get('create', 'UserController@users_create')->name('users.create');
    Route::post('store', 'UserController@users_store')->name('users.store');
    Route::get('{user:id}', 'UserController@users_update')->name('users.update');
    Route::patch('{user:id}/edit', 'UserController@users_edit')->name('users.edit');
    Route::delete('', 'UserController@users_delete')->name('users.delete');
});



/* SEMESTER VIII */


Route::prefix('semester_VIII/uas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UasController@semester_VIII_uas')->name('semester_VIII.uas');
    Route::get('{semester:id}', 'UasController@semester_VIII_uas_mata_kuliah')->name('semester_VIII.uas.mata_kuliah');
    Route::get('{semester:id}/create', 'UasController@semester_VIII_uas_mata_kuliah_create')->name('semester_VIII.uas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UasController@semester_VIII_uas_mata_kuliah_store')->name('semester_VIII.uas.mata_kuliah.store');
    Route::get('{semester:id}/show/{uas:id}', 'UasController@semester_VIII_uas_mata_kuliah_show')->name('semester_VIII.uas.mata_kuliah.show');
    Route::get('{semester:id}/update/{uas:id}', 'UasController@semester_VIII_uas_mata_kuliah_update')->name('semester_VIII.uas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uas:id}', 'UasController@semester_VIII_uas_mata_kuliah_edit')->name('semester_VIII.uas.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uas:id}', 'UasController@semester_VIII_uas_mata_kuliah_delete')->name('semester_VIII.uas.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uas:id}', 'UasController@semester_VIII_uas_mata_kuliah_answer')->name('semester_VIII.uas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uas/{uas:id}', 'UasController@semester_VIII_uas_mata_kuliah_answer_uas')->name('semester_VIII.uas.mata_kuliah.answer_uas');
    Route::get('{semester:id}/download/{uas:id}', 'UasController@semester_VIII_uas_mata_kuliah_download')->name('semester_VIII.uas.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uas:id}', 'UasController@semester_VIII_uas_mata_kuliah_download_answer')->name('semester_VIII.uas.mata_kuliah.download_answer');
});

Route::prefix('semester_VIII/uts')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UtsController@semester_VIII_uts')->name('semester_VIII.uts');
    Route::get('{semester:id}', 'UtsController@semester_VIII_uts_mata_kuliah')->name('semester_VIII.uts.mata_kuliah');
    Route::get('{semester:id}/create', 'UtsController@semester_VIII_uts_mata_kuliah_create')->name('semester_VIII.uts.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UtsController@semester_VIII_uts_mata_kuliah_store')->name('semester_VIII.uts.mata_kuliah.store');
    Route::get('{semester:id}/show/{uts:id}', 'UtsController@semester_VIII_uts_mata_kuliah_show')->name('semester_VIII.uts.mata_kuliah.show');
    Route::get('{semester:id}/update/{uts:id}', 'UtsController@semester_VIII_uts_mata_kuliah_update')->name('semester_VIII.uts.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uts:id}', 'UtsController@semester_VIII_uts_mata_kuliah_edit')->name('semester_VIII.uts.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uts:id}', 'UtsController@semester_VIII_uts_mata_kuliah_delete')->name('semester_VIII.uts.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uts:id}', 'UtsController@semester_VIII_uts_mata_kuliah_answer')->name('semester_VIII.uts.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uts/{uts:id}', 'UtsController@semester_VIII_uts_mata_kuliah_answer_uts')->name('semester_VIII.uts.mata_kuliah.answer_uts');
    Route::get('{semester:id}/download/{uts:id}', 'UtsController@semester_VIII_uts_mata_kuliah_download')->name('semester_VIII.uts.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uts:id}', 'UtsController@semester_VIII_uts_mata_kuliah_download_answer')->name('semester_VIII.uts.mata_kuliah.download_answer');
});

Route::prefix('semester_VIII/tugas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'TugasController@semester_VIII_tugas')->name('semester_VIII.tugas');
    Route::get('{semester:id}', 'TugasController@semester_VIII_tugas_mata_kuliah')->name('semester_VIII.tugas.mata_kuliah');
    Route::get('{semester:id}/create', 'TugasController@semester_VIII_tugas_mata_kuliah_create')->name('semester_VIII.tugas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'TugasController@semester_VIII_tugas_mata_kuliah_store')->name('semester_VIII.tugas.mata_kuliah.store');
    Route::get('{semester:id}/show/{tugas:id}', 'TugasController@semester_VIII_tugas_mata_kuliah_show')->name('semester_VIII.tugas.mata_kuliah.show');
    Route::delete('{semester:id}/delete/{tugas:id}', 'TugasController@semester_VIII_tugas_mata_kuliah_delete')->name('semester_VIII.tugas.mata_kuliah.delete');
    Route::get('{semester:id}/update/{tugas:id}', 'TugasController@semester_VIII_tugas_mata_kuliah_update')->name('semester_VIII.tugas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{tugas:id}', 'TugasController@semester_VIII_tugas_mata_kuliah_edit')->name('semester_VIII.tugas.mata_kuliah.edit');
    Route::get('{semester:id}/download/{tugas:id}', 'TugasController@semester_VIII_tugas_mata_kuliah_download')->name('semester_VIII.tugas.mata_kuliah.download');
    Route::get('{semester:id}/answer/{tugas:id}', 'TugasController@semester_VIII_tugas_mata_kuliah_answer')->name('semester_VIII.tugas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_tugas/{tugas:id}', 'TugasController@semester_VIII_tugas_mata_kuliah_answer_tugas')->name('semester_VIII.tugas.mata_kuliah.answer_tugas');
    Route::get('{semester:id}/download_answer/{tugas:id}', 'TugasController@semester_VIII_tugas_mata_kuliah_download_answer')->name('semester_VIII.tugas.mata_kuliah.download_answer');
});

Route::prefix('semester_VIII/materi')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'MateriController@semester_VIII_materi')->name('semester_VIII.materi');
    Route::get('{semester:id}', 'MateriController@semester_VIII_materi_mata_kuliah')->name('semester_VIII.materi.mata_kuliah');
    Route::get('{semester:id}/create', 'MateriController@semester_VIII_materi_mata_kuliah_create')->name('semester_VIII.materi.mata_kuliah.create');
    Route::post('{semester:id}/store', 'MateriController@semester_VIII_materi_mata_kuliah_store')->name('semester_VIII.materi.mata_kuliah.store');
    Route::get('{semester:id}/show/{materi:id}', 'MateriController@semester_VIII_materi_mata_kuliah_show')->name('semester_VIII.materi.mata_kuliah.show');
    Route::get('{semester:id}/update/{materi:id}', 'MateriController@semester_VIII_materi_mata_kuliah_update')->name('semester_VIII.materi.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{materi:id}', 'MateriController@semester_VIII_materi_mata_kuliah_edit')->name('semester_VIII.materi.mata_kuliah.edit');
    Route::get('{semester:id}/download/{materi:id}', 'MateriController@semester_VIII_materi_mata_kuliah_download')->name('semester_VIII.materi.mata_kuliah.download');
    Route::delete('{semester:id}/delete/{materi:id}', 'MateriController@semester_VIII_materi_mata_kuliah_delete')->name('semester_VIII.materi.mata_kuliah.delete');
});

Route::prefix('semester_VIII')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'SemesterController@semester_VIII_index')->name('semester_VIII');
    Route::get('create', 'SemesterController@semester_VIII_create')->name('semester_VIII.create');
    Route::post('store', 'SemesterController@semester_VIII_store')->name('semester_VIII.store');
    Route::get('{semester:id}', 'SemesterController@semester_VIII_update')->name('semester_VIII.update');
    Route::patch('{semester:id}/edit', 'SemesterController@semester_VIII_edit')->name('semester_VIII.edit');
    Route::delete('', 'SemesterController@semester_VIII_delete')->name('semester_VIII.delete');
});



/* SEMESTER VII */


Route::prefix('semester_VII/uas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UasController@semester_VII_uas')->name('semester_VII.uas');
    Route::get('{semester:id}', 'UasController@semester_VII_uas_mata_kuliah')->name('semester_VII.uas.mata_kuliah');
    Route::get('{semester:id}/create', 'UasController@semester_VII_uas_mata_kuliah_create')->name('semester_VII.uas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UasController@semester_VII_uas_mata_kuliah_store')->name('semester_VII.uas.mata_kuliah.store');
    Route::get('{semester:id}/show/{uas:id}', 'UasController@semester_VII_uas_mata_kuliah_show')->name('semester_VII.uas.mata_kuliah.show');
    Route::get('{semester:id}/update/{uas:id}', 'UasController@semester_VII_uas_mata_kuliah_update')->name('semester_VII.uas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uas:id}', 'UasController@semester_VII_uas_mata_kuliah_edit')->name('semester_VII.uas.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uas:id}', 'UasController@semester_VII_uas_mata_kuliah_delete')->name('semester_VII.uas.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uas:id}', 'UasController@semester_VII_uas_mata_kuliah_answer')->name('semester_VII.uas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uas/{uas:id}', 'UasController@semester_VII_uas_mata_kuliah_answer_uas')->name('semester_VII.uas.mata_kuliah.answer_uas');
    Route::get('{semester:id}/download/{uas:id}', 'UasController@semester_VII_uas_mata_kuliah_download')->name('semester_VII.uas.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uas:id}', 'UasController@semester_VII_uas_mata_kuliah_download_answer')->name('semester_VII.uas.mata_kuliah.download_answer');
});

Route::prefix('semester_VII/uts')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UtsController@semester_VII_uts')->name('semester_VII.uts');
    Route::get('{semester:id}', 'UtsController@semester_VII_uts_mata_kuliah')->name('semester_VII.uts.mata_kuliah');
    Route::get('{semester:id}/create', 'UtsController@semester_VII_uts_mata_kuliah_create')->name('semester_VII.uts.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UtsController@semester_VII_uts_mata_kuliah_store')->name('semester_VII.uts.mata_kuliah.store');
    Route::get('{semester:id}/show/{uts:id}', 'UtsController@semester_VII_uts_mata_kuliah_show')->name('semester_VII.uts.mata_kuliah.show');
    Route::get('{semester:id}/update/{uts:id}', 'UtsController@semester_VII_uts_mata_kuliah_update')->name('semester_VII.uts.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uts:id}', 'UtsController@semester_VII_uts_mata_kuliah_edit')->name('semester_VII.uts.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uts:id}', 'UtsController@semester_VII_uts_mata_kuliah_delete')->name('semester_VII.uts.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uts:id}', 'UtsController@semester_VII_uts_mata_kuliah_answer')->name('semester_VII.uts.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uts/{uts:id}', 'UtsController@semester_VII_uts_mata_kuliah_answer_uts')->name('semester_VII.uts.mata_kuliah.answer_uts');
    Route::get('{semester:id}/download/{uts:id}', 'UtsController@semester_VII_uts_mata_kuliah_download')->name('semester_VII.uts.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uts:id}', 'UtsController@semester_VII_uts_mata_kuliah_download_answer')->name('semester_VII.uts.mata_kuliah.download_answer');
});

Route::prefix('semester_VII/tugas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'TugasController@semester_VII_tugas')->name('semester_VII.tugas');
    Route::get('{semester:id}', 'TugasController@semester_VII_tugas_mata_kuliah')->name('semester_VII.tugas.mata_kuliah');
    Route::get('{semester:id}/create', 'TugasController@semester_VII_tugas_mata_kuliah_create')->name('semester_VII.tugas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'TugasController@semester_VII_tugas_mata_kuliah_store')->name('semester_VII.tugas.mata_kuliah.store');
    Route::get('{semester:id}/show/{tugas:id}', 'TugasController@semester_VII_tugas_mata_kuliah_show')->name('semester_VII.tugas.mata_kuliah.show');
    Route::delete('{semester:id}/delete/{tugas:id}', 'TugasController@semester_VII_tugas_mata_kuliah_delete')->name('semester_VII.tugas.mata_kuliah.delete');
    Route::get('{semester:id}/update/{tugas:id}', 'TugasController@semester_VII_tugas_mata_kuliah_update')->name('semester_VII.tugas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{tugas:id}', 'TugasController@semester_VII_tugas_mata_kuliah_edit')->name('semester_VII.tugas.mata_kuliah.edit');
    Route::get('{semester:id}/download/{tugas:id}', 'TugasController@semester_VII_tugas_mata_kuliah_download')->name('semester_VII.tugas.mata_kuliah.download');
    Route::get('{semester:id}/answer/{tugas:id}', 'TugasController@semester_VII_tugas_mata_kuliah_answer')->name('semester_VII.tugas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_tugas/{tugas:id}', 'TugasController@semester_VII_tugas_mata_kuliah_answer_tugas')->name('semester_VII.tugas.mata_kuliah.answer_tugas');
    Route::get('{semester:id}/download_answer/{tugas:id}', 'TugasController@semester_VII_tugas_mata_kuliah_download_answer')->name('semester_VII.tugas.mata_kuliah.download_answer');
});

Route::prefix('semester_VII/materi')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'MateriController@semester_VII_materi')->name('semester_VII.materi');
    Route::get('{semester:id}', 'MateriController@semester_VII_materi_mata_kuliah')->name('semester_VII.materi.mata_kuliah');
    Route::get('{semester:id}/create', 'MateriController@semester_VII_materi_mata_kuliah_create')->name('semester_VII.materi.mata_kuliah.create');
    Route::post('{semester:id}/store', 'MateriController@semester_VII_materi_mata_kuliah_store')->name('semester_VII.materi.mata_kuliah.store');
    Route::get('{semester:id}/show/{materi:id}', 'MateriController@semester_VII_materi_mata_kuliah_show')->name('semester_VII.materi.mata_kuliah.show');
    Route::get('{semester:id}/update/{materi:id}', 'MateriController@semester_VII_materi_mata_kuliah_update')->name('semester_VII.materi.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{materi:id}', 'MateriController@semester_VII_materi_mata_kuliah_edit')->name('semester_VII.materi.mata_kuliah.edit');
    Route::get('{semester:id}/download/{materi:id}', 'MateriController@semester_VII_materi_mata_kuliah_download')->name('semester_VII.materi.mata_kuliah.download');
    Route::delete('{semester:id}/delete/{materi:id}', 'MateriController@semester_VII_materi_mata_kuliah_delete')->name('semester_VII.materi.mata_kuliah.delete');
});

Route::prefix('semester_VII')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'SemesterController@semester_VII_index')->name('semester_VII');
    Route::get('create', 'SemesterController@semester_VII_create')->name('semester_VII.create');
    Route::post('store', 'SemesterController@semester_VII_store')->name('semester_VII.store');
    Route::get('{semester:id}', 'SemesterController@semester_VII_update')->name('semester_VII.update');
    Route::patch('{semester:id}/edit', 'SemesterController@semester_VII_edit')->name('semester_VII.edit');
    Route::delete('', 'SemesterController@semester_VII_delete')->name('semester_VII.delete');
});



/* SEMESTER VI */


Route::prefix('semester_VI/uas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UasController@semester_VI_uas')->name('semester_VI.uas');
    Route::get('{semester:id}', 'UasController@semester_VI_uas_mata_kuliah')->name('semester_VI.uas.mata_kuliah');
    Route::get('{semester:id}/create', 'UasController@semester_VI_uas_mata_kuliah_create')->name('semester_VI.uas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UasController@semester_VI_uas_mata_kuliah_store')->name('semester_VI.uas.mata_kuliah.store');
    Route::get('{semester:id}/show/{uas:id}', 'UasController@semester_VI_uas_mata_kuliah_show')->name('semester_VI.uas.mata_kuliah.show');
    Route::get('{semester:id}/update/{uas:id}', 'UasController@semester_VI_uas_mata_kuliah_update')->name('semester_VI.uas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uas:id}', 'UasController@semester_VI_uas_mata_kuliah_edit')->name('semester_VI.uas.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uas:id}', 'UasController@semester_VI_uas_mata_kuliah_delete')->name('semester_VI.uas.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uas:id}', 'UasController@semester_VI_uas_mata_kuliah_answer')->name('semester_VI.uas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uas/{uas:id}', 'UasController@semester_VI_uas_mata_kuliah_answer_uas')->name('semester_VI.uas.mata_kuliah.answer_uas');
    Route::get('{semester:id}/download/{uas:id}', 'UasController@semester_VI_uas_mata_kuliah_download')->name('semester_VI.uas.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uas:id}', 'UasController@semester_VI_uas_mata_kuliah_download_answer')->name('semester_VI.uas.mata_kuliah.download_answer');
});

Route::prefix('semester_VI/uts')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UtsController@semester_VI_uts')->name('semester_VI.uts');
    Route::get('{semester:id}', 'UtsController@semester_VI_uts_mata_kuliah')->name('semester_VI.uts.mata_kuliah');
    Route::get('{semester:id}/create', 'UtsController@semester_VI_uts_mata_kuliah_create')->name('semester_VI.uts.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UtsController@semester_VI_uts_mata_kuliah_store')->name('semester_VI.uts.mata_kuliah.store');
    Route::get('{semester:id}/show/{uts:id}', 'UtsController@semester_VI_uts_mata_kuliah_show')->name('semester_VI.uts.mata_kuliah.show');
    Route::get('{semester:id}/update/{uts:id}', 'UtsController@semester_VI_uts_mata_kuliah_update')->name('semester_VI.uts.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uts:id}', 'UtsController@semester_VI_uts_mata_kuliah_edit')->name('semester_VI.uts.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uts:id}', 'UtsController@semester_VI_uts_mata_kuliah_delete')->name('semester_VI.uts.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uts:id}', 'UtsController@semester_VI_uts_mata_kuliah_answer')->name('semester_VI.uts.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uts/{uts:id}', 'UtsController@semester_VI_uts_mata_kuliah_answer_uts')->name('semester_VI.uts.mata_kuliah.answer_uts');
    Route::get('{semester:id}/download/{uts:id}', 'UtsController@semester_VI_uts_mata_kuliah_download')->name('semester_VI.uts.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uts:id}', 'UtsController@semester_VI_uts_mata_kuliah_download_answer')->name('semester_VI.uts.mata_kuliah.download_answer');
});

Route::prefix('semester_VI/tugas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'TugasController@semester_VI_tugas')->name('semester_VI.tugas');
    Route::get('{semester:id}', 'TugasController@semester_VI_tugas_mata_kuliah')->name('semester_VI.tugas.mata_kuliah');
    Route::get('{semester:id}/create', 'TugasController@semester_VI_tugas_mata_kuliah_create')->name('semester_VI.tugas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'TugasController@semester_VI_tugas_mata_kuliah_store')->name('semester_VI.tugas.mata_kuliah.store');
    Route::get('{semester:id}/show/{tugas:id}', 'TugasController@semester_VI_tugas_mata_kuliah_show')->name('semester_VI.tugas.mata_kuliah.show');
    Route::delete('{semester:id}/delete/{tugas:id}', 'TugasController@semester_VI_tugas_mata_kuliah_delete')->name('semester_VI.tugas.mata_kuliah.delete');
    Route::get('{semester:id}/update/{tugas:id}', 'TugasController@semester_VI_tugas_mata_kuliah_update')->name('semester_VI.tugas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{tugas:id}', 'TugasController@semester_VI_tugas_mata_kuliah_edit')->name('semester_VI.tugas.mata_kuliah.edit');
    Route::get('{semester:id}/download/{tugas:id}', 'TugasController@semester_VI_tugas_mata_kuliah_download')->name('semester_VI.tugas.mata_kuliah.download');
    Route::get('{semester:id}/answer/{tugas:id}', 'TugasController@semester_VI_tugas_mata_kuliah_answer')->name('semester_VI.tugas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_tugas/{tugas:id}', 'TugasController@semester_VI_tugas_mata_kuliah_answer_tugas')->name('semester_VI.tugas.mata_kuliah.answer_tugas');
    Route::get('{semester:id}/download_answer/{tugas:id}', 'TugasController@semester_VI_tugas_mata_kuliah_download_answer')->name('semester_VI.tugas.mata_kuliah.download_answer');
});

Route::prefix('semester_VI/materi')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'MateriController@semester_VI_materi')->name('semester_VI.materi');
    Route::get('{semester:id}', 'MateriController@semester_VI_materi_mata_kuliah')->name('semester_VI.materi.mata_kuliah');
    Route::get('{semester:id}/create', 'MateriController@semester_VI_materi_mata_kuliah_create')->name('semester_VI.materi.mata_kuliah.create');
    Route::post('{semester:id}/store', 'MateriController@semester_VI_materi_mata_kuliah_store')->name('semester_VI.materi.mata_kuliah.store');
    Route::get('{semester:id}/show/{materi:id}', 'MateriController@semester_VI_materi_mata_kuliah_show')->name('semester_VI.materi.mata_kuliah.show');
    Route::get('{semester:id}/update/{materi:id}', 'MateriController@semester_VI_materi_mata_kuliah_update')->name('semester_VI.materi.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{materi:id}', 'MateriController@semester_VI_materi_mata_kuliah_edit')->name('semester_VI.materi.mata_kuliah.edit');
    Route::get('{semester:id}/download/{materi:id}', 'MateriController@semester_VI_materi_mata_kuliah_download')->name('semester_VI.materi.mata_kuliah.download');
    Route::delete('{semester:id}/delete/{materi:id}', 'MateriController@semester_VI_materi_mata_kuliah_delete')->name('semester_VI.materi.mata_kuliah.delete');
});

Route::prefix('semester_VI')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'SemesterController@semester_VI_index')->name('semester_VI');
    Route::get('create', 'SemesterController@semester_VI_create')->name('semester_VI.create');
    Route::post('store', 'SemesterController@semester_VI_store')->name('semester_VI.store');
    Route::get('{semester:id}', 'SemesterController@semester_VI_update')->name('semester_VI.update');
    Route::patch('{semester:id}/edit', 'SemesterController@semester_VI_edit')->name('semester_VI.edit');
    Route::delete('', 'SemesterController@semester_VI_delete')->name('semester_VI.delete');
});



/* SEMESTER V */


Route::prefix('semester_V/uas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UasController@semester_V_uas')->name('semester_V.uas');
    Route::get('{semester:id}', 'UasController@semester_V_uas_mata_kuliah')->name('semester_V.uas.mata_kuliah');
    Route::get('{semester:id}/create', 'UasController@semester_V_uas_mata_kuliah_create')->name('semester_V.uas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UasController@semester_V_uas_mata_kuliah_store')->name('semester_V.uas.mata_kuliah.store');
    Route::get('{semester:id}/show/{uas:id}', 'UasController@semester_V_uas_mata_kuliah_show')->name('semester_V.uas.mata_kuliah.show');
    Route::get('{semester:id}/update/{uas:id}', 'UasController@semester_V_uas_mata_kuliah_update')->name('semester_V.uas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uas:id}', 'UasController@semester_V_uas_mata_kuliah_edit')->name('semester_V.uas.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uas:id}', 'UasController@semester_V_uas_mata_kuliah_delete')->name('semester_V.uas.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uas:id}', 'UasController@semester_V_uas_mata_kuliah_answer')->name('semester_V.uas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uas/{uas:id}', 'UasController@semester_V_uas_mata_kuliah_answer_uas')->name('semester_V.uas.mata_kuliah.answer_uas');
    Route::get('{semester:id}/download/{uas:id}', 'UasController@semester_V_uas_mata_kuliah_download')->name('semester_V.uas.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uas:id}', 'UasController@semester_V_uas_mata_kuliah_download_answer')->name('semester_V.uas.mata_kuliah.download_answer');
});

Route::prefix('semester_V/uts')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UtsController@semester_V_uts')->name('semester_V.uts');
    Route::get('{semester:id}', 'UtsController@semester_V_uts_mata_kuliah')->name('semester_V.uts.mata_kuliah');
    Route::get('{semester:id}/create', 'UtsController@semester_V_uts_mata_kuliah_create')->name('semester_V.uts.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UtsController@semester_V_uts_mata_kuliah_store')->name('semester_V.uts.mata_kuliah.store');
    Route::get('{semester:id}/show/{uts:id}', 'UtsController@semester_V_uts_mata_kuliah_show')->name('semester_V.uts.mata_kuliah.show');
    Route::get('{semester:id}/update/{uts:id}', 'UtsController@semester_V_uts_mata_kuliah_update')->name('semester_V.uts.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uts:id}', 'UtsController@semester_V_uts_mata_kuliah_edit')->name('semester_V.uts.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uts:id}', 'UtsController@semester_V_uts_mata_kuliah_delete')->name('semester_V.uts.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uts:id}', 'UtsController@semester_V_uts_mata_kuliah_answer')->name('semester_V.uts.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uts/{uts:id}', 'UtsController@semester_V_uts_mata_kuliah_answer_uts')->name('semester_V.uts.mata_kuliah.answer_uts');
    Route::get('{semester:id}/download/{uts:id}', 'UtsController@semester_V_uts_mata_kuliah_download')->name('semester_V.uts.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uts:id}', 'UtsController@semester_V_uts_mata_kuliah_download_answer')->name('semester_V.uts.mata_kuliah.download_answer');
});

Route::prefix('semester_V/tugas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'TugasController@semester_V_tugas')->name('semester_V.tugas');
    Route::get('{semester:id}', 'TugasController@semester_V_tugas_mata_kuliah')->name('semester_V.tugas.mata_kuliah');
    Route::get('{semester:id}/create', 'TugasController@semester_V_tugas_mata_kuliah_create')->name('semester_V.tugas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'TugasController@semester_V_tugas_mata_kuliah_store')->name('semester_V.tugas.mata_kuliah.store');
    Route::get('{semester:id}/show/{tugas:id}', 'TugasController@semester_V_tugas_mata_kuliah_show')->name('semester_V.tugas.mata_kuliah.show');
    Route::delete('{semester:id}/delete/{tugas:id}', 'TugasController@semester_V_tugas_mata_kuliah_delete')->name('semester_V.tugas.mata_kuliah.delete');
    Route::get('{semester:id}/update/{tugas:id}', 'TugasController@semester_V_tugas_mata_kuliah_update')->name('semester_V.tugas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{tugas:id}', 'TugasController@semester_V_tugas_mata_kuliah_edit')->name('semester_V.tugas.mata_kuliah.edit');
    Route::get('{semester:id}/download/{tugas:id}', 'TugasController@semester_V_tugas_mata_kuliah_download')->name('semester_V.tugas.mata_kuliah.download');
    Route::get('{semester:id}/answer/{tugas:id}', 'TugasController@semester_V_tugas_mata_kuliah_answer')->name('semester_V.tugas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_tugas/{tugas:id}', 'TugasController@semester_V_tugas_mata_kuliah_answer_tugas')->name('semester_V.tugas.mata_kuliah.answer_tugas');
    Route::get('{semester:id}/download_answer/{tugas:id}', 'TugasController@semester_V_tugas_mata_kuliah_download_answer')->name('semester_V.tugas.mata_kuliah.download_answer');
});

Route::prefix('semester_V/materi')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'MateriController@semester_V_materi')->name('semester_V.materi');
    Route::get('{semester:id}', 'MateriController@semester_V_materi_mata_kuliah')->name('semester_V.materi.mata_kuliah');
    Route::get('{semester:id}/create', 'MateriController@semester_V_materi_mata_kuliah_create')->name('semester_V.materi.mata_kuliah.create');
    Route::post('{semester:id}/store', 'MateriController@semester_V_materi_mata_kuliah_store')->name('semester_V.materi.mata_kuliah.store');
    Route::get('{semester:id}/show/{materi:id}', 'MateriController@semester_V_materi_mata_kuliah_show')->name('semester_V.materi.mata_kuliah.show');
    Route::get('{semester:id}/update/{materi:id}', 'MateriController@semester_V_materi_mata_kuliah_update')->name('semester_V.materi.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{materi:id}', 'MateriController@semester_V_materi_mata_kuliah_edit')->name('semester_V.materi.mata_kuliah.edit');
    Route::get('{semester:id}/download/{materi:id}', 'MateriController@semester_V_materi_mata_kuliah_download')->name('semester_V.materi.mata_kuliah.download');
    Route::delete('{semester:id}/delete/{materi:id}', 'MateriController@semester_V_materi_mata_kuliah_delete')->name('semester_V.materi.mata_kuliah.delete');
});

Route::prefix('semester_V')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'SemesterController@semester_V_index')->name('semester_V');
    Route::get('create', 'SemesterController@semester_V_create')->name('semester_V.create');
    Route::post('store', 'SemesterController@semester_V_store')->name('semester_V.store');
    Route::get('{semester:id}', 'SemesterController@semester_V_update')->name('semester_V.update');
    Route::patch('{semester:id}/edit', 'SemesterController@semester_V_edit')->name('semester_V.edit');
    Route::delete('', 'SemesterController@semester_V_delete')->name('semester_V.delete');
});


/* SEMESTER IV */


Route::prefix('semester_IV/uas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UasController@semester_IV_uas')->name('semester_IV.uas');
    Route::get('{semester:id}', 'UasController@semester_IV_uas_mata_kuliah')->name('semester_IV.uas.mata_kuliah');
    Route::get('{semester:id}/create', 'UasController@semester_IV_uas_mata_kuliah_create')->name('semester_IV.uas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UasController@semester_IV_uas_mata_kuliah_store')->name('semester_IV.uas.mata_kuliah.store');
    Route::get('{semester:id}/show/{uas:id}', 'UasController@semester_IV_uas_mata_kuliah_show')->name('semester_IV.uas.mata_kuliah.show');
    Route::get('{semester:id}/update/{uas:id}', 'UasController@semester_IV_uas_mata_kuliah_update')->name('semester_IV.uas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uas:id}', 'UasController@semester_IV_uas_mata_kuliah_edit')->name('semester_IV.uas.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uas:id}', 'UasController@semester_IV_uas_mata_kuliah_delete')->name('semester_IV.uas.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uas:id}', 'UasController@semester_IV_uas_mata_kuliah_answer')->name('semester_IV.uas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uas/{uas:id}', 'UasController@semester_IV_uas_mata_kuliah_answer_uas')->name('semester_IV.uas.mata_kuliah.answer_uas');
    Route::get('{semester:id}/download/{uas:id}', 'UasController@semester_IV_uas_mata_kuliah_download')->name('semester_IV.uas.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uas:id}', 'UasController@semester_IV_uas_mata_kuliah_download_answer')->name('semester_IV.uas.mata_kuliah.download_answer');
});

Route::prefix('semester_IV/uts')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UtsController@semester_IV_uts')->name('semester_IV.uts');
    Route::get('{semester:id}', 'UtsController@semester_IV_uts_mata_kuliah')->name('semester_IV.uts.mata_kuliah');
    Route::get('{semester:id}/create', 'UtsController@semester_IV_uts_mata_kuliah_create')->name('semester_IV.uts.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UtsController@semester_IV_uts_mata_kuliah_store')->name('semester_IV.uts.mata_kuliah.store');
    Route::get('{semester:id}/show/{uts:id}', 'UtsController@semester_IV_uts_mata_kuliah_show')->name('semester_IV.uts.mata_kuliah.show');
    Route::get('{semester:id}/update/{uts:id}', 'UtsController@semester_IV_uts_mata_kuliah_update')->name('semester_IV.uts.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uts:id}', 'UtsController@semester_IV_uts_mata_kuliah_edit')->name('semester_IV.uts.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uts:id}', 'UtsController@semester_IV_uts_mata_kuliah_delete')->name('semester_IV.uts.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uts:id}', 'UtsController@semester_IV_uts_mata_kuliah_answer')->name('semester_IV.uts.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uts/{uts:id}', 'UtsController@semester_IV_uts_mata_kuliah_answer_uts')->name('semester_IV.uts.mata_kuliah.answer_uts');
    Route::get('{semester:id}/download/{uts:id}', 'UtsController@semester_IV_uts_mata_kuliah_download')->name('semester_IV.uts.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uts:id}', 'UtsController@semester_IV_uts_mata_kuliah_download_answer')->name('semester_IV.uts.mata_kuliah.download_answer');
});

Route::prefix('semester_IV/tugas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'TugasController@semester_IV_tugas')->name('semester_IV.tugas');
    Route::get('{semester:id}', 'TugasController@semester_IV_tugas_mata_kuliah')->name('semester_IV.tugas.mata_kuliah');
    Route::get('{semester:id}/create', 'TugasController@semester_IV_tugas_mata_kuliah_create')->name('semester_IV.tugas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'TugasController@semester_IV_tugas_mata_kuliah_store')->name('semester_IV.tugas.mata_kuliah.store');
    Route::get('{semester:id}/show/{tugas:id}', 'TugasController@semester_IV_tugas_mata_kuliah_show')->name('semester_IV.tugas.mata_kuliah.show');
    Route::delete('{semester:id}/delete/{tugas:id}', 'TugasController@semester_IV_tugas_mata_kuliah_delete')->name('semester_IV.tugas.mata_kuliah.delete');
    Route::get('{semester:id}/update/{tugas:id}', 'TugasController@semester_IV_tugas_mata_kuliah_update')->name('semester_IV.tugas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{tugas:id}', 'TugasController@semester_IV_tugas_mata_kuliah_edit')->name('semester_IV.tugas.mata_kuliah.edit');
    Route::get('{semester:id}/download/{tugas:id}', 'TugasController@semester_IV_tugas_mata_kuliah_download')->name('semester_IV.tugas.mata_kuliah.download');
    Route::get('{semester:id}/answer/{tugas:id}', 'TugasController@semester_IV_tugas_mata_kuliah_answer')->name('semester_IV.tugas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_tugas/{tugas:id}', 'TugasController@semester_IV_tugas_mata_kuliah_answer_tugas')->name('semester_IV.tugas.mata_kuliah.answer_tugas');
    Route::get('{semester:id}/download_answer/{tugas:id}', 'TugasController@semester_IV_tugas_mata_kuliah_download_answer')->name('semester_IV.tugas.mata_kuliah.download_answer');
});

Route::prefix('semester_IV/materi')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'MateriController@semester_IV_materi')->name('semester_IV.materi');
    Route::get('{semester:id}', 'MateriController@semester_IV_materi_mata_kuliah')->name('semester_IV.materi.mata_kuliah');
    Route::get('{semester:id}/create', 'MateriController@semester_IV_materi_mata_kuliah_create')->name('semester_IV.materi.mata_kuliah.create');
    Route::post('{semester:id}/store', 'MateriController@semester_IV_materi_mata_kuliah_store')->name('semester_IV.materi.mata_kuliah.store');
    Route::get('{semester:id}/show/{materi:id}', 'MateriController@semester_IV_materi_mata_kuliah_show')->name('semester_IV.materi.mata_kuliah.show');
    Route::get('{semester:id}/update/{materi:id}', 'MateriController@semester_IV_materi_mata_kuliah_update')->name('semester_IV.materi.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{materi:id}', 'MateriController@semester_IV_materi_mata_kuliah_edit')->name('semester_IV.materi.mata_kuliah.edit');
    Route::get('{semester:id}/download/{materi:id}', 'MateriController@semester_IV_materi_mata_kuliah_download')->name('semester_IV.materi.mata_kuliah.download');
    Route::delete('{semester:id}/delete/{materi:id}', 'MateriController@semester_IV_materi_mata_kuliah_delete')->name('semester_IV.materi.mata_kuliah.delete');
});

Route::prefix('semester_IV')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'SemesterController@semester_IV_index')->name('semester_IV');
    Route::get('create', 'SemesterController@semester_IV_create')->name('semester_IV.create');
    Route::post('store', 'SemesterController@semester_IV_store')->name('semester_IV.store');
    Route::get('{semester:id}', 'SemesterController@semester_IV_update')->name('semester_IV.update');
    Route::patch('{semester:id}/edit', 'SemesterController@semester_IV_edit')->name('semester_IV.edit');
    Route::delete('', 'SemesterController@semester_IV_delete')->name('semester_IV.delete');
});



/* SEMESTER III */


Route::prefix('semester_III/uas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UasController@semester_III_uas')->name('semester_III.uas');
    Route::get('{semester:id}', 'UasController@semester_III_uas_mata_kuliah')->name('semester_III.uas.mata_kuliah');
    Route::get('{semester:id}/create', 'UasController@semester_III_uas_mata_kuliah_create')->name('semester_III.uas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UasController@semester_III_uas_mata_kuliah_store')->name('semester_III.uas.mata_kuliah.store');
    Route::get('{semester:id}/show/{uas:id}', 'UasController@semester_III_uas_mata_kuliah_show')->name('semester_III.uas.mata_kuliah.show');
    Route::get('{semester:id}/update/{uas:id}', 'UasController@semester_III_uas_mata_kuliah_update')->name('semester_III.uas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uas:id}', 'UasController@semester_III_uas_mata_kuliah_edit')->name('semester_III.uas.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uas:id}', 'UasController@semester_III_uas_mata_kuliah_delete')->name('semester_III.uas.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uas:id}', 'UasController@semester_III_uas_mata_kuliah_answer')->name('semester_III.uas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uas/{uas:id}', 'UasController@semester_III_uas_mata_kuliah_answer_uas')->name('semester_III.uas.mata_kuliah.answer_uas');
    Route::get('{semester:id}/download/{uas:id}', 'UasController@semester_III_uas_mata_kuliah_download')->name('semester_III.uas.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uas:id}', 'UasController@semester_III_uas_mata_kuliah_download_answer')->name('semester_III.uas.mata_kuliah.download_answer');
});

Route::prefix('semester_III/uts')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UtsController@semester_III_uts')->name('semester_III.uts');
    Route::get('{semester:id}', 'UtsController@semester_III_uts_mata_kuliah')->name('semester_III.uts.mata_kuliah');
    Route::get('{semester:id}/create', 'UtsController@semester_III_uts_mata_kuliah_create')->name('semester_III.uts.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UtsController@semester_III_uts_mata_kuliah_store')->name('semester_III.uts.mata_kuliah.store');
    Route::get('{semester:id}/show/{uts:id}', 'UtsController@semester_III_uts_mata_kuliah_show')->name('semester_III.uts.mata_kuliah.show');
    Route::get('{semester:id}/update/{uts:id}', 'UtsController@semester_III_uts_mata_kuliah_update')->name('semester_III.uts.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uts:id}', 'UtsController@semester_III_uts_mata_kuliah_edit')->name('semester_III.uts.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uts:id}', 'UtsController@semester_III_uts_mata_kuliah_delete')->name('semester_III.uts.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uts:id}', 'UtsController@semester_III_uts_mata_kuliah_answer')->name('semester_III.uts.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uts/{uts:id}', 'UtsController@semester_III_uts_mata_kuliah_answer_uts')->name('semester_III.uts.mata_kuliah.answer_uts');
    Route::get('{semester:id}/download/{uts:id}', 'UtsController@semester_III_uts_mata_kuliah_download')->name('semester_III.uts.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uts:id}', 'UtsController@semester_III_uts_mata_kuliah_download_answer')->name('semester_III.uts.mata_kuliah.download_answer');
});

Route::prefix('semester_III/tugas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'TugasController@semester_III_tugas')->name('semester_III.tugas');
    Route::get('{semester:id}', 'TugasController@semester_III_tugas_mata_kuliah')->name('semester_III.tugas.mata_kuliah');
    Route::get('{semester:id}/create', 'TugasController@semester_III_tugas_mata_kuliah_create')->name('semester_III.tugas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'TugasController@semester_III_tugas_mata_kuliah_store')->name('semester_III.tugas.mata_kuliah.store');
    Route::get('{semester:id}/show/{tugas:id}', 'TugasController@semester_III_tugas_mata_kuliah_show')->name('semester_III.tugas.mata_kuliah.show');
    Route::delete('{semester:id}/delete/{tugas:id}', 'TugasController@semester_III_tugas_mata_kuliah_delete')->name('semester_III.tugas.mata_kuliah.delete');
    Route::get('{semester:id}/update/{tugas:id}', 'TugasController@semester_III_tugas_mata_kuliah_update')->name('semester_III.tugas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{tugas:id}', 'TugasController@semester_III_tugas_mata_kuliah_edit')->name('semester_III.tugas.mata_kuliah.edit');
    Route::get('{semester:id}/download/{tugas:id}', 'TugasController@semester_III_tugas_mata_kuliah_download')->name('semester_III.tugas.mata_kuliah.download');
    Route::get('{semester:id}/answer/{tugas:id}', 'TugasController@semester_III_tugas_mata_kuliah_answer')->name('semester_III.tugas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_tugas/{tugas:id}', 'TugasController@semester_III_tugas_mata_kuliah_answer_tugas')->name('semester_III.tugas.mata_kuliah.answer_tugas');
    Route::get('{semester:id}/download_answer/{tugas:id}', 'TugasController@semester_III_tugas_mata_kuliah_download_answer')->name('semester_III.tugas.mata_kuliah.download_answer');
});

Route::prefix('semester_III/materi')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'MateriController@semester_III_materi')->name('semester_III.materi');
    Route::get('{semester:id}', 'MateriController@semester_III_materi_mata_kuliah')->name('semester_III.materi.mata_kuliah');
    Route::get('{semester:id}/create', 'MateriController@semester_III_materi_mata_kuliah_create')->name('semester_III.materi.mata_kuliah.create');
    Route::post('{semester:id}/store', 'MateriController@semester_III_materi_mata_kuliah_store')->name('semester_III.materi.mata_kuliah.store');
    Route::get('{semester:id}/show/{materi:id}', 'MateriController@semester_III_materi_mata_kuliah_show')->name('semester_III.materi.mata_kuliah.show');
    Route::get('{semester:id}/update/{materi:id}', 'MateriController@semester_III_materi_mata_kuliah_update')->name('semester_III.materi.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{materi:id}', 'MateriController@semester_III_materi_mata_kuliah_edit')->name('semester_III.materi.mata_kuliah.edit');
    Route::get('{semester:id}/download/{materi:id}', 'MateriController@semester_III_materi_mata_kuliah_download')->name('semester_III.materi.mata_kuliah.download');
    Route::delete('{semester:id}/delete/{materi:id}', 'MateriController@semester_III_materi_mata_kuliah_delete')->name('semester_III.materi.mata_kuliah.delete');
});

Route::prefix('semester_III')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'SemesterController@semester_III_index')->name('semester_III');
    Route::get('create', 'SemesterController@semester_III_create')->name('semester_III.create');
    Route::post('store', 'SemesterController@semester_III_store')->name('semester_III.store');
    Route::get('{semester:id}', 'SemesterController@semester_III_update')->name('semester_III.update');
    Route::patch('{semester:id}/edit', 'SemesterController@semester_III_edit')->name('semester_III.edit');
    Route::delete('', 'SemesterController@semester_III_delete')->name('semester_III.delete');
});




/* SEMESTER II */


Route::prefix('semester_II/uas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UasController@semester_II_uas')->name('semester_II.uas');
    Route::get('{semester:id}', 'UasController@semester_II_uas_mata_kuliah')->name('semester_II.uas.mata_kuliah');
    Route::get('{semester:id}/create', 'UasController@semester_II_uas_mata_kuliah_create')->name('semester_II.uas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UasController@semester_II_uas_mata_kuliah_store')->name('semester_II.uas.mata_kuliah.store');
    Route::get('{semester:id}/show/{uas:id}', 'UasController@semester_II_uas_mata_kuliah_show')->name('semester_II.uas.mata_kuliah.show');
    Route::get('{semester:id}/update/{uas:id}', 'UasController@semester_II_uas_mata_kuliah_update')->name('semester_II.uas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uas:id}', 'UasController@semester_II_uas_mata_kuliah_edit')->name('semester_II.uas.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uas:id}', 'UasController@semester_II_uas_mata_kuliah_delete')->name('semester_II.uas.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uas:id}', 'UasController@semester_II_uas_mata_kuliah_answer')->name('semester_II.uas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uas/{uas:id}', 'UasController@semester_II_uas_mata_kuliah_answer_uas')->name('semester_II.uas.mata_kuliah.answer_uas');
    Route::get('{semester:id}/download/{uas:id}', 'UasController@semester_II_uas_mata_kuliah_download')->name('semester_II.uas.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uas:id}', 'UasController@semester_II_uas_mata_kuliah_download_answer')->name('semester_II.uas.mata_kuliah.download_answer');
});

Route::prefix('semester_II/uts')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UtsController@semester_II_uts')->name('semester_II.uts');
    Route::get('{semester:id}', 'UtsController@semester_II_uts_mata_kuliah')->name('semester_II.uts.mata_kuliah');
    Route::get('{semester:id}/create', 'UtsController@semester_II_uts_mata_kuliah_create')->name('semester_II.uts.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UtsController@semester_II_uts_mata_kuliah_store')->name('semester_II.uts.mata_kuliah.store');
    Route::get('{semester:id}/show/{uts:id}', 'UtsController@semester_II_uts_mata_kuliah_show')->name('semester_II.uts.mata_kuliah.show');
    Route::get('{semester:id}/update/{uts:id}', 'UtsController@semester_II_uts_mata_kuliah_update')->name('semester_II.uts.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uts:id}', 'UtsController@semester_II_uts_mata_kuliah_edit')->name('semester_II.uts.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uts:id}', 'UtsController@semester_II_uts_mata_kuliah_delete')->name('semester_II.uts.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uts:id}', 'UtsController@semester_II_uts_mata_kuliah_answer')->name('semester_II.uts.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uts/{uts:id}', 'UtsController@semester_II_uts_mata_kuliah_answer_uts')->name('semester_II.uts.mata_kuliah.answer_uts');
    Route::get('{semester:id}/download/{uts:id}', 'UtsController@semester_II_uts_mata_kuliah_download')->name('semester_II.uts.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uts:id}', 'UtsController@semester_II_uts_mata_kuliah_download_answer')->name('semester_II.uts.mata_kuliah.download_answer');
});

Route::prefix('semester_II/tugas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'TugasController@semester_II_tugas')->name('semester_II.tugas');
    Route::get('{semester:id}', 'TugasController@semester_II_tugas_mata_kuliah')->name('semester_II.tugas.mata_kuliah');
    Route::get('{semester:id}/create', 'TugasController@semester_II_tugas_mata_kuliah_create')->name('semester_II.tugas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'TugasController@semester_II_tugas_mata_kuliah_store')->name('semester_II.tugas.mata_kuliah.store');
    Route::get('{semester:id}/show/{tugas:id}', 'TugasController@semester_II_tugas_mata_kuliah_show')->name('semester_II.tugas.mata_kuliah.show');
    Route::delete('{semester:id}/delete/{tugas:id}', 'TugasController@semester_II_tugas_mata_kuliah_delete')->name('semester_II.tugas.mata_kuliah.delete');
    Route::get('{semester:id}/update/{tugas:id}', 'TugasController@semester_II_tugas_mata_kuliah_update')->name('semester_II.tugas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{tugas:id}', 'TugasController@semester_II_tugas_mata_kuliah_edit')->name('semester_II.tugas.mata_kuliah.edit');
    Route::get('{semester:id}/download/{tugas:id}', 'TugasController@semester_II_tugas_mata_kuliah_download')->name('semester_II.tugas.mata_kuliah.download');
    Route::get('{semester:id}/answer/{tugas:id}', 'TugasController@semester_II_tugas_mata_kuliah_answer')->name('semester_II.tugas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_tugas/{tugas:id}', 'TugasController@semester_II_tugas_mata_kuliah_answer_tugas')->name('semester_II.tugas.mata_kuliah.answer_tugas');
    Route::get('{semester:id}/download_answer/{tugas:id}', 'TugasController@semester_II_tugas_mata_kuliah_download_answer')->name('semester_II.tugas.mata_kuliah.download_answer');
});

Route::prefix('semester_II/materi')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'MateriController@semester_II_materi')->name('semester_II.materi');
    Route::get('{semester:id}', 'MateriController@semester_II_materi_mata_kuliah')->name('semester_II.materi.mata_kuliah');
    Route::get('{semester:id}/create', 'MateriController@semester_II_materi_mata_kuliah_create')->name('semester_II.materi.mata_kuliah.create');
    Route::post('{semester:id}/store', 'MateriController@semester_II_materi_mata_kuliah_store')->name('semester_II.materi.mata_kuliah.store');
    Route::get('{semester:id}/show/{materi:id}', 'MateriController@semester_II_materi_mata_kuliah_show')->name('semester_II.materi.mata_kuliah.show');
    Route::get('{semester:id}/update/{materi:id}', 'MateriController@semester_II_materi_mata_kuliah_update')->name('semester_II.materi.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{materi:id}', 'MateriController@semester_II_materi_mata_kuliah_edit')->name('semester_II.materi.mata_kuliah.edit');
    Route::get('{semester:id}/download/{materi:id}', 'MateriController@semester_II_materi_mata_kuliah_download')->name('semester_II.materi.mata_kuliah.download');
    Route::delete('{semester:id}/delete/{materi:id}', 'MateriController@semester_II_materi_mata_kuliah_delete')->name('semester_II.materi.mata_kuliah.delete');
});

Route::prefix('semester_II')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'SemesterController@semester_II_index')->name('semester_II');
    Route::get('create', 'SemesterController@semester_II_create')->name('semester_II.create');
    Route::post('store', 'SemesterController@semester_II_store')->name('semester_II.store');
    Route::get('{semester:id}', 'SemesterController@semester_II_update')->name('semester_II.update');
    Route::patch('{semester:id}/edit', 'SemesterController@semester_II_edit')->name('semester_II.edit');
    Route::delete('', 'SemesterController@semester_II_delete')->name('semester_II.delete');
});






/* SEMESTER I */

Route::prefix('semester_I/uas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UasController@semester_I_uas')->name('semester_I.uas');
    Route::get('{semester:id}', 'UasController@semester_I_uas_mata_kuliah')->name('semester_I.uas.mata_kuliah');
    Route::get('{semester:id}/create', 'UasController@semester_I_uas_mata_kuliah_create')->name('semester_I.uas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UasController@semester_I_uas_mata_kuliah_store')->name('semester_I.uas.mata_kuliah.store');
    Route::get('{semester:id}/show/{uas:id}', 'UasController@semester_I_uas_mata_kuliah_show')->name('semester_I.uas.mata_kuliah.show');
    Route::get('{semester:id}/update/{uas:id}', 'UasController@semester_I_uas_mata_kuliah_update')->name('semester_I.uas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uas:id}', 'UasController@semester_I_uas_mata_kuliah_edit')->name('semester_I.uas.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uas:id}', 'UasController@semester_I_uas_mata_kuliah_delete')->name('semester_I.uas.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uas:id}', 'UasController@semester_I_uas_mata_kuliah_answer')->name('semester_I.uas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uas/{uas:id}', 'UasController@semester_I_uas_mata_kuliah_answer_uas')->name('semester_I.uas.mata_kuliah.answer_uas');
    Route::get('{semester:id}/download/{uas:id}', 'UasController@semester_I_uas_mata_kuliah_download')->name('semester_I.uas.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uas:id}', 'UasController@semester_I_uas_mata_kuliah_download_answer')->name('semester_I.uas.mata_kuliah.download_answer');
});

Route::prefix('semester_I/uts')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'UtsController@semester_I_uts')->name('semester_I.uts');
    Route::get('{semester:id}', 'UtsController@semester_I_uts_mata_kuliah')->name('semester_I.uts.mata_kuliah');
    Route::get('{semester:id}/create', 'UtsController@semester_I_uts_mata_kuliah_create')->name('semester_I.uts.mata_kuliah.create');
    Route::post('{semester:id}/store', 'UtsController@semester_I_uts_mata_kuliah_store')->name('semester_I.uts.mata_kuliah.store');
    Route::get('{semester:id}/show/{uts:id}', 'UtsController@semester_I_uts_mata_kuliah_show')->name('semester_I.uts.mata_kuliah.show');
    Route::get('{semester:id}/update/{uts:id}', 'UtsController@semester_I_uts_mata_kuliah_update')->name('semester_I.uts.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{uts:id}', 'UtsController@semester_I_uts_mata_kuliah_edit')->name('semester_I.uts.mata_kuliah.edit');
    Route::delete('{semester:id}/delete/{uts:id}', 'UtsController@semester_I_uts_mata_kuliah_delete')->name('semester_I.uts.mata_kuliah.delete');
    Route::get('{semester:id}/answer/{uts:id}', 'UtsController@semester_I_uts_mata_kuliah_answer')->name('semester_I.uts.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_uts/{uts:id}', 'UtsController@semester_I_uts_mata_kuliah_answer_uts')->name('semester_I.uts.mata_kuliah.answer_uts');
    Route::get('{semester:id}/download/{uts:id}', 'UtsController@semester_I_uts_mata_kuliah_download')->name('semester_I.uts.mata_kuliah.download');
    Route::get('{semester:id}/download_answer/{uts:id}', 'UtsController@semester_I_uts_mata_kuliah_download_answer')->name('semester_I.uts.mata_kuliah.download_answer');
});

Route::prefix('semester_I/tugas')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'TugasController@semester_I_tugas')->name('semester_I.tugas');
    Route::get('{semester:id}', 'TugasController@semester_I_tugas_mata_kuliah')->name('semester_I.tugas.mata_kuliah');
    Route::get('{semester:id}/create', 'TugasController@semester_I_tugas_mata_kuliah_create')->name('semester_I.tugas.mata_kuliah.create');
    Route::post('{semester:id}/store', 'TugasController@semester_I_tugas_mata_kuliah_store')->name('semester_I.tugas.mata_kuliah.store');
    Route::get('{semester:id}/show/{tugas:id}', 'TugasController@semester_I_tugas_mata_kuliah_show')->name('semester_I.tugas.mata_kuliah.show');
    Route::delete('{semester:id}/delete/{tugas:id}', 'TugasController@semester_I_tugas_mata_kuliah_delete')->name('semester_I.tugas.mata_kuliah.delete');
    Route::get('{semester:id}/update/{tugas:id}', 'TugasController@semester_I_tugas_mata_kuliah_update')->name('semester_I.tugas.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{tugas:id}', 'TugasController@semester_I_tugas_mata_kuliah_edit')->name('semester_I.tugas.mata_kuliah.edit');
    Route::get('{semester:id}/download/{tugas:id}', 'TugasController@semester_I_tugas_mata_kuliah_download')->name('semester_I.tugas.mata_kuliah.download');
    Route::get('{semester:id}/answer/{tugas:id}', 'TugasController@semester_I_tugas_mata_kuliah_answer')->name('semester_I.tugas.mata_kuliah.answer');
    Route::patch('{semester:id}/answer_tugas/{tugas:id}', 'TugasController@semester_I_tugas_mata_kuliah_answer_tugas')->name('semester_I.tugas.mata_kuliah.answer_tugas');
    Route::get('{semester:id}/download_answer/{tugas:id}', 'TugasController@semester_I_tugas_mata_kuliah_download_answer')->name('semester_I.tugas.mata_kuliah.download_answer');
});

Route::prefix('semester_I/materi')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'MateriController@semester_I_materi')->name('semester_I.materi');
    Route::get('{semester:id}', 'MateriController@semester_I_materi_mata_kuliah')->name('semester_I.materi.mata_kuliah');
    Route::get('{semester:id}/create', 'MateriController@semester_I_materi_mata_kuliah_create')->name('semester_I.materi.mata_kuliah.create');
    Route::post('{semester:id}/store', 'MateriController@semester_I_materi_mata_kuliah_store')->name('semester_I.materi.mata_kuliah.store');
    Route::get('{semester:id}/show/{materi:id}', 'MateriController@semester_I_materi_mata_kuliah_show')->name('semester_I.materi.mata_kuliah.show');
    Route::get('{semester:id}/update/{materi:id}', 'MateriController@semester_I_materi_mata_kuliah_update')->name('semester_I.materi.mata_kuliah.update');
    Route::patch('{semester:id}/edit/{materi:id}', 'MateriController@semester_I_materi_mata_kuliah_edit')->name('semester_I.materi.mata_kuliah.edit');
    Route::get('{semester:id}/download/{materi:id}', 'MateriController@semester_I_materi_mata_kuliah_download')->name('semester_I.materi.mata_kuliah.download');
    Route::delete('{semester:id}/delete/{materi:id}', 'MateriController@semester_I_materi_mata_kuliah_delete')->name('semester_I.materi.mata_kuliah.delete');
});

Route::prefix('semester_I')->middleware('auth', 'role:user')->group(function () {
    Route::get('', 'SemesterController@semester_I_index')->name('semester_I');
    Route::get('create', 'SemesterController@semester_I_create')->name('semester_I.create');
    Route::post('store', 'SemesterController@semester_I_store')->name('semester_I.store');
    Route::get('{semester:id}', 'SemesterController@semester_I_update')->name('semester_I.update');
    Route::patch('{semester:id}/edit', 'SemesterController@semester_I_edit')->name('semester_I.edit');
    Route::delete('', 'SemesterController@semester_I_delete')->name('semester_I.delete');
});
