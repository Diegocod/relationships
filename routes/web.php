<?php

use App\Http\Controllers\{
    OneToOneController,
    OneToManyController
};

use Illuminate\Support\Facades\Route;

/**
 * One To One
 */

Route::get('/one-to-one-insert', [OneToOneController::class, 'oneToOneInsert'])->name('relationships.oneToOneInsert');
Route::get('/one-to-one-inverse', [OneToOneController::class, 'oneToOneInverse'])->name("relationships.oneToOneInverse");
Route::get('/one-to-one', [OneToOneController::class, 'oneToOne'])->name("relationships.oneToOne");

Route::get('/one-to-many', [OneToManyController::class, 'oneToMany'])->name('relationships.oneToMany');
Route::get('/many-to-one', [OneToManyController::class, 'manyToOne'])->name('relationships.manyToOne');


Route::get('/', function () {
    return view('welcome');
});
