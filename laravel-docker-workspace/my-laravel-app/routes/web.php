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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/home', 'PagesController@getHome');
Route::post('/home', 'PagesController@postIndex');
Route::get('/control', 'PagesController@getControl');
Route::get('/img', 'PagesController@getImg');
Route::post('/upload', 'PagesController@upload');
Route::post('/control/delete/{id}', 'PagesController@delete');
Route::get('/', 'PagesController@getDB');

// dbテスト
Route::get('/dbtest', function(){

    // connection先を明示してDB3を見に行く
    $rows = DB::connection('mysql_3')->select('SELECT * FROM tb LIMIT 1;');
    var_dump($rows);

});
