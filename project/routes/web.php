<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// spaのルートを「/」から「/app/*」に変えたのでリダイレクトを挟む。
Route::get('/', function () {
    return redirect('/app/index?lang=ja');
});

// spaのルーティング
Route::get('/app/{any}', function () {
    return view('app');
})->where('any', '.*');
