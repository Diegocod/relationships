<?php

use App\Http\Controllers\{
    OneToOneController
};

use Illuminate\Support\Facades\Route;

/**
 * One To One
 */

Route::get('/one-to-one-inverse', [OneToOneController::class, 'oneToOneInverse'])->name("relationships.oneToOneInverse");
Route::get('/one-to-one', [OneToOneController::class, 'oneToOne'])->name("relationships.oneToOne");

Route::get('/', function () {
    return view('welcome');
});
