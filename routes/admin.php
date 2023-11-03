<?php

use App\Http\Controllers\admin\SpeciePhotosController;
use App\Http\Controllers\admin\FamiliesController;
use App\Http\Controllers\admin\SpecieController;
use App\Http\Controllers\admin\TreesController;
use App\Http\Controllers\admin\ZoneController;
use App\Http\Controllers\admin\ZoneCoordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/',[AdminController::class,'index'])->name('admin.index');

Route::resource('families',FamiliesController::class)->names('admin.families');
Route::resource('species', SpecieController::class)->names('admin.species');
Route::resource('speciephotos', SpeciePhotosController::class)->names('admin.speciephotos');
Route::resource('zones', ZoneController::class)->names('admin.zones');
Route::resource('zonescoords', ZoneCoordController::class)->names('admin.zonecoords');
Route::resource('trees', TreesController::class)->names('admin.trees');
Route::get('species_family/{family_id}',[FamiliesController::class, 'species_family'])->name('admin.species_family');