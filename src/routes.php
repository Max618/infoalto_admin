<?php

Route::prefix('painel')->group( function () {
    Route::resource('roles','\Infoalto\Admin\Controllers\RoleController');
    Route::resource('permission', '\Infoalto\Admin\Controllers\PermissionController');
});



//AUTH ROUTES
Route::middleware(['web'])->group( function () {
    Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::post('password/email', '\App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', '\App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', '\App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', '\App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
});