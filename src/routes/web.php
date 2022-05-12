<?php
Route::group(['namespace'=>'Yarm\Genre\Http\Controllers','middleware'=>['web']], function (){
    Route::get('genre', 'GenreController@index')->name('genre');
    Route::post('genre', 'GenreController@store');
    Route::get('genre/delete/{id}', 'GenreController@destroy')->name('delete');
});


