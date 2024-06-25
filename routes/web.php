<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts/app');
});

Route::get('/reservation', function () {
    return view('reservation/reservation');
});