<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\ProductController;

Route::get('/',[AppController::class, 'index'])->name('index');

Route::get('produit',[EventsController::class,'produit'])->name('produit');

Route::get('list',[EventsController::class,'list'])->name('list');

Route::get('edit/{id}', [EventsController::class,'edit'])->name('edit');

Route::delete('delete_product/{id}', [EventsController::class,'delete_product'])->name('delete_product');
