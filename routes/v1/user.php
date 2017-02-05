<?php 

Route::get('user', ['as' => 'user', 'uses' => function (Request $request) {
    return $request->user();
}])->middleware('auth:api');
