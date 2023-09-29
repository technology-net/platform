<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'IBoot\Platform\app\Http\Controllers', 'prefix'=>'admin'], function () {
    Route::resource('users', 'UserController')->except(['show']);
});
