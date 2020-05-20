<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('testreader');
});

Route::get('/search', 'RSScontroller@search')->name('search');

Route::get('/sortDateDesc', 'RSScontroller@date_desc')->name('sortDateDesc');

Route::get('/sortDateAsc', 'RSScontroller@date_asc')->name('sortDateAsc');
