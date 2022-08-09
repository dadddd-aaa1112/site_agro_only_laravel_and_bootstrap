<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', \App\Http\Controllers\Admin\Main\IndexController::class)->name('admin');



    Route::group(['prefix' => 'users', 'middleware' => 'admin'], function () {
        Route::get('/excel_export', \App\Http\Controllers\Admin\User\ExportController::class)->name('admin.user.export');
        Route::post('/excel_import', \App\Http\Controllers\Admin\User\ExcelController::class)->name('admin.user.excel');
        Route::get('/{user}/restore', [ \App\Http\Controllers\Admin\User\RestoreController::class, 'restoreData'])->name('admin.user.restore');
        Route::get('/restore_all', [ \App\Http\Controllers\Admin\User\RestoreController::class, 'restoreAll'])->name('admin.user.restore_all');
        Route::get('/{user}/force_delete', [ \App\Http\Controllers\Admin\User\RestoreController::class, 'forceDelete'])->name('admin.user.force_delete');
        Route::post('/', \App\Http\Controllers\Admin\User\StoreController::class)->name('admin.user.store');
        Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)->name('admin.user.index');
        Route::get('/create', \App\Http\Controllers\Admin\User\CreateController::class)->name('admin.user.create');
        Route::get('/{user}', \App\Http\Controllers\Admin\User\ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', \App\Http\Controllers\Admin\User\EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.user.update');
        Route::delete('{user}', \App\Http\Controllers\Admin\User\DestroyController::class)->name('admin.user.destroy');
    });

    Route::group(['prefix' => 'clients', 'middleware' => 'admin'], function() {
        Route::get('/document_dogovor/{id}', \App\Http\Controllers\Admin\Client\DogovorController::class)->name('admin.document.dogovor');
        Route::get('/excel_export', \App\Http\Controllers\Admin\Client\ExportController::class)->name('admin.client.export');
        Route::post('/excel_import', \App\Http\Controllers\Admin\Client\ExcelController::class)->name('admin.client.excel');
        Route::get('/{client}/restore' , [\App\Http\Controllers\Admin\Client\RestoreController::class, 'restoreData'])->name('admin.client.restore');
        Route::get('/restore_all' ,  [\App\Http\Controllers\Admin\Client\RestoreController::class,'restoreAll'])->name('admin.client.restore_all');
        Route::get('/{client}/force_delete', [\App\Http\Controllers\Admin\Client\RestoreController::class, 'forceDelete'])->name('admin.client.force_delete');
        Route::get('/', \App\Http\Controllers\Admin\Client\IndexController::class)->name('admin.client.index');
        Route::get('/create', \App\Http\Controllers\Admin\Client\CreateController::class)->name('admin.client.create');
        Route::post('/', \App\Http\Controllers\Admin\Client\StoreController::class)->name('admin.client.store');
        Route::get('/{client}', \App\Http\Controllers\Admin\Client\ShowController::class)->name('admin.client.show');
        Route::patch('/{client}', \App\Http\Controllers\Admin\Client\UpdateController::class)->name('admin.client.update');
        Route::delete('/{client}', \App\Http\Controllers\Admin\Client\DestroyController::class)->name('admin.client.destroy');
        Route::get('/{client}/edit', \App\Http\Controllers\Admin\Client\EditController::class)->name('admin.client.edit');
    });

    Route::group(['prefix' => 'cultures'], function() {
        Route::get('/excel_export', \App\Http\Controllers\Admin\Culture\ExportController::class)->name('admin.culture.export');
        Route::post('/excel_import', \App\Http\Controllers\Admin\Culture\ExcelController::class)->name('admin.culture.excel');
        Route::get('/{culture}/restore', [\App\Http\Controllers\Admin\Culture\RestoreController::class, 'restoreTask'])->name('admin.culture.restore');
        Route::get('/{culture}/force_delete', [\App\Http\Controllers\Admin\Culture\RestoreController::class, 'forceDelete'])->name('admin.culture.force_delete');
        Route::get('/restore_all', [\App\Http\Controllers\Admin\Culture\RestoreController::class, 'restore_all'])->name('admin.culture.restore_all');
        Route::get('/', \App\Http\Controllers\Admin\Culture\IndexController::class)->name('admin.culture.index');
        Route::get('/create', \App\Http\Controllers\Admin\Culture\CreateController::class)->name('admin.culture.create');
        Route::post('/', \App\Http\Controllers\Admin\Culture\StoreController::class)->name('admin.culture.store');
        Route::get('/{culture}', \App\Http\Controllers\Admin\Culture\ShowController::class)->name('admin.culture.show');
        Route::patch('/{culture}', \App\Http\Controllers\Admin\Culture\UpdateController::class)->name('admin.culture.update');
        Route::delete('/{culture}', \App\Http\Controllers\Admin\Culture\DestroyController::class)->name('admin.culture.destroy');
        Route::get('/{culture}/edit', \App\Http\Controllers\Admin\Culture\EditController::class)->name('admin.culture.edit');


    });

    Route::group(['prefix' => 'fertilizers'], function () {
        Route::get('/excel_export', \App\Http\Controllers\Admin\Fertilizer\ExportController::class)->name('admin.fertilizer.export');
        Route::post('/excel_import', \App\Http\Controllers\Admin\Fertilizer\ExcelController::class)->name('admin.fertilizer.excel');
        Route::get('/{fertilizer}/restore',[\App\Http\Controllers\Admin\Fertilizer\RestoreController::class, 'restoreData'])->name('admin.fertilizer.restore');
        Route::get('/restore_all',[\App\Http\Controllers\Admin\Fertilizer\RestoreController::class, 'restoreAll'])->name('admin.fertilizer.restore_all');
        Route::get('/{fertilizer}/force_delete', [\App\Http\Controllers\Admin\Fertilizer\RestoreController::class, 'forceDelete'])->name('admin.fertilizer.force_delete');
        Route::get('/', \App\Http\Controllers\Admin\Fertilizer\IndexController::class)->name('admin.fertilizer.index');
        Route::get('/create', \App\Http\Controllers\Admin\Fertilizer\CreateController::class)->name('admin.fertilizer.create');
        Route::post('/', \App\Http\Controllers\Admin\Fertilizer\StoreController::class)->name('admin.fertilizer.store');
        Route::get('/{fertilizer}', \App\Http\Controllers\Admin\Fertilizer\ShowController::class)->name('admin.fertilizer.show');
        Route::patch('/{fertilizer}', \App\Http\Controllers\Admin\Fertilizer\UpdateController::class)->name('admin.fertilizer.update');
        Route::delete('/{fertilizer}', \App\Http\Controllers\Admin\Fertilizer\DestroyController::class)->name('admin.fertilizer.destroy');
        Route::get('/{fertilizer}/edit', \App\Http\Controllers\Admin\Fertilizer\EditController::class)->name('admin.fertilizer.edit');

    });

    Route::group(['prefix' => 'imports'], function () {
        Route::get('/', \App\Http\Controllers\Admin\Import\IndexController::class)->name('admin.import.index');
    });

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
