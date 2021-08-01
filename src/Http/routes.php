<?php

Route::group([
    'namespace' => 'CryptaEve\Seat\Strict\Http\Controllers',
    'middleware' => ['web', 'auth'],
    'prefix' => 'strict',
], function () {

    Route::get('/configure', [
        'as'   => 'strict.list',
        'uses' => 'StrictController@getConfigureView',
        'middleware' => 'can:strict.configure',
    ]);

    Route::post('/configure', [
        'as'   => 'strict.savesettings',
        'uses' => 'StrictController@saveSettings',
        'middleware' => 'can:strict.configure',
    ]);

    Route::get('/about', [
        'as'   => 'strict.about',
        'uses' => 'StrictController@getAboutView',
        'middleware' => 'can:strict.configure',
    ]);
});
