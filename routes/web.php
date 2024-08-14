<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatBotController;

Route::get('/', function () {
    return view('home');
});
Route::post('send',[ChatBotController::class, 'sendChat']);