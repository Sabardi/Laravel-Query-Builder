<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

Route::get('/insert',[MahasiswaController::class,'insert']);
Route::get('/update', [MahasiswaController::class,'update']);
Route::get('/updateWhere', [MahasiswaController::class,'updateWhere']);
Route::get('/updateOrInsert', [MahasiswaController::class,'updateOrInsert']);
Route::get('/delete', [MahasiswaController::class,'delete']);
Route::get('/get', [MahasiswaController::class,'get']);
Route::get('/getTampil', [MahasiswaController::class,'getTampil']);
Route::get('/getView', [MahasiswaController::class,'getView']);
Route::get('/getWhere', [MahasiswaController::class,'getWhere']);
Route::get('/select', [MahasiswaController::class,'select']);
Route::get('/take', [MahasiswaController::class,'take']);
Route::get('/first', [MahasiswaController::class,'first']);
Route::get('/find', [MahasiswaController::class,'find']);
Route::get('/raw', [MahasiswaController::class,'raw']);
