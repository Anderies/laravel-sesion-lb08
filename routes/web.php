<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-submit', function (){
    return view('test-submit');
});

Route::post('/submit', function(){
    return "form has been submitted";
});