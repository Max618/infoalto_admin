<?php

Route::middleware(['web'])->group( function () {
    //AUTH ROUTES
    Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
    Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::post('password/email', '\App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', '\App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', '\App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', '\App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');

    //PAINEL ROUTES
    Route::prefix('painel')->group( function () {
        Route::get('/', '\Infoalto\Admin\Controllers\PainelController@index')->name('painel');
        Route::resource('role','\Infoalto\Admin\Controllers\RoleController');
        Route::resource('user', '\Infoalto\Admin\Controllers\UserController');
        Route::get("/me","\Infoalto\Admin\Controllers\ProfileController@index")->name("profile.index");
        Route::get("/me/create","\Infoalto\Admin\Controllers\ProfileController@create")->name("profile.create");
        Route::post("/me","\Infoalto\Admin\Controllers\ProfileController@store")->name("profile.store");
    });
});

