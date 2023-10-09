<?php

use IBoot\Core\app\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'IBoot\Platform\app\Http\Controllers',
    'prefix'=>'admin',
    'middleware' => 'web'
], function () {
    Route::resource('users', 'UserController')->except(['show'])->middleware(Authenticate::class);;
});
