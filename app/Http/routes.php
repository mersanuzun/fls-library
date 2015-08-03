<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get("/", function(){
    return view("main");
});
Route::get("/management/librarian", "LibrarianCtrl@index");
Route::get("/management/librarian/circulation", "LibrarianCtrl@circulation");
Route::post("/management/librarian/circulation", "LibrarianCtrl@circulationControl");
Route::get("/auth/login", "Auth\AuthController@getLogin");
Route::get("management/librarian/deneme", "LibrarianCtrl@denemeDB");