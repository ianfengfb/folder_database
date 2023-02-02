<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;

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

Route::get('/', [FolderController::class, 'index']);

Route::post('/rootfolder', [FolderController::class, 'root']);

Route::post('/folders', [FolderController::class, 'store']);

Route::get('/open/{folder}', [FolderController::class, 'open']);