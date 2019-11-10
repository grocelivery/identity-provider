<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/status', 'StatusController@getStatus');

Route::post('/register', 'Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/verify/{token}', 'Auth\VerificationController@verify');

Route::group(['middleware' => 'auth:api'], function (): void {
    Route::get('/me', 'UserController@getAuthenticatedUser');
    Route::post('/token/validate', 'Auth\AccessTokenController@validate');
    Route::post('/token/revoke', 'Auth\AccessTokenController@revokeCurrent');
    Route::post('/token/revoke/all', 'Auth\AccessTokenController@revokeAll');
});
