<?php

use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;


Route::middleware('isAdmin')->group(function (){
    Route::get('/chambre/all',[ChambreController::class, 'index'])->name('chambre_all');
    Route::get('/chambre/{id}',[ChambreController::class, 'show'])->name('chambre_show');
    Route::post('/chambre/add',[ChambreController::class, 'store'])->name('chambre_store');
    Route::post('/chambre/update/{id}',[ChambreController::class, 'update'])->name('chambre_update');
    Route::post('/chambre/delete/{id}',[ChambreController::class, 'destroy'])->name('chambre_delete');

    Route::get('/personnel/all',[PersonnelController::class,'index'])->name('personnel_all');
    Route::get('/personnel/{id}',[PersonnelController::class, 'show'])->name('personnel_show');
    Route::post('/personnel/add',[PersonnelController::class,'store'])->name('personnel_store');
    Route::post('/personnel/update/{id}',[PersonnelController::class, 'update'])->name('personnel_update');
    Route::post('/personnel/delete/{id}',[PersonnelController::class, 'destroy'])->name('personnel_delete');

    Route::get('/reservation/all',[ReservationController::class, 'index'])->name('reservation_all');
    Route::get('/reservation/{id}',[ReservationController::class, 'show'])->name('reservation_show');
    Route::post('/reservation/add',[ReservationController::class, 'store'])->name('reservation_add');
    Route::post('/reservation/update/{id}',[ReservationController::class, 'update'])->name('reservation_update');
    Route::get('/reservation/delete/{id}',[ReservationController::class, 'destroy'])->name('reservation_delete');

    Route::get('/client/all',[ClientController::class, 'index'])->name('client_all');
    Route::get('/client/{id}',[ClientController::class, 'show'])->name('client_show');
    Route::post('/client/add',[ClientController::class, 'store'])->name('client_store');
    Route::post('/client/update/{id}',[ClientController::class, 'update'])->name('client_update');
    Route::get('/client/delete/{id}',[ClientController::class, 'destroy'])->name('client_delete');
});

