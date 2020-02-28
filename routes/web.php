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

Route::get('/', function(){
    return redirect()->route('suggestions.index');
});

// Naming routes for simple calling
Route::get('/suggestions/add', 'SuggestionController@add')->name('suggestions.add');
Route::get('/suggestions', 'SuggestionController@index')->name('suggestions.index');
Route::get('/suggestions/{id}/edit/', 'SuggestionController@edit')->name('suggestions.edit');
Route::get('/suggestions/{id}/upvote/', 'SuggestionController@upvote');
Route::get('/suggestions/{id}/downvote/', 'SuggestionController@downvote');

Route::delete('/suggestions/{id}/delete/', 'SuggestionController@delete')->name('suggestions.delete');

Route::patch('/suggestions/{id}/update/', 'SuggestionController@update')->name('suggestions.update');

Route::post('/suggestions/new', 'SuggestionController@store')->name('suggestions.store');

// Vote Functionality
Route::get('/suggestions/{suggestion_id}/upvote', 'SuggestionController@Upvote')->name('upvote');
Route::delete('/suggestions/{suggestion_id}/downvote', 'SuggestionController@Downvote')->name('downvote');