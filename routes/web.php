<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'BookController@getIndex',
    'as' => 'book.index'
]);



Route::group(['prefix' => 'book'], function() {
    Route::get('/', [
        'uses' => 'BookController@getIndex',
        'as' => 'book.index'
    ]);

    Route::get('create', [
        'uses' => 'BookController@getCreate',
        'as' => 'book.create'
    ]);

    Route::post('create', [
        'uses' => 'BookController@postCreate',
        'as' => 'book.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'BookController@getEdit',
        'as' => 'book.edit'
    ]);

    Route::post('edit', [
        'uses' => 'BookController@postUpdate',
        'as' => 'book.update'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'BookController@getDelete',
        'as' => 'book.delete'
    ]);
});


Route::group(['prefix' => 'author'], function() {
    Route::get('/', [
        'uses' => 'AuthorController@getIndex',
        'as' => 'author.index'
    ]);

    Route::get('create', [
        'uses' => 'AuthorController@getCreate',
        'as' => 'author.create'
    ]);

    Route::post('create', [
        'uses' => 'AuthorController@postCreate',
        'as' => 'author.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'AuthorController@getEdit',
        'as' => 'author.edit'
    ]);

    Route::post('edit', [
        'uses' => 'AuthorController@postUpdate',
        'as' => 'author.update'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'AuthorController@getDelete',
        'as' => 'author.delete'
    ]);
});