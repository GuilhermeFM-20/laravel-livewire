<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Create;
use App\Livewire\Grid;
use App\Livewire\Update;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Grid::class)->name('grid');
Route::get('/create', Create::class)->name('create');
Route::get('/update', Update::class)->name('update');


