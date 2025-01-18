<?php

use App\Models\articles;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

