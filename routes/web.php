<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

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

Auth::routes();

Route::get('/', [DocumentController::class, 'index'])->name('home');
Route::get('/create', [DocumentController::class, 'create'])->name('create_document');
Route::post('/create', [DocumentController::class, 'store'])->name('store_document');

Route::get('/view/{id}', [DocumentController::class, 'view'])->name('view_document');
Route::get('/open/{id}', [DocumentController::class, 'open_pdf'])->name('pdf_document');

Route::get('/delete/{id}', [DocumentController::class, 'delete'])->name('delete_document');
Route::delete('/delete/{id}', [DocumentController::class, 'destroy'])->name('delete_document');
Route::get('/edit/{id}', [DocumentController::class, 'edit'])->name('edit_document');
Route::patch('/edit/{id}', [DocumentController::class, 'update'])->name('edit_document');

//Route::resource('documents', DocumentController::class);