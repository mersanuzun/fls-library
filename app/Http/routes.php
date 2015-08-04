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

// Librarian Page
Route::get("/management/librarian", "LibrarianCtrl@index");
Route::get("/management/librarian/circulation", "LibrarianCtrl@circulation");
Route::post("/management/librarian/circulation", "LibrarianCtrl@circulationControl");
Route::get("management/librarian/deneme", "LibrarianCtrl@denemeDB");
Route::get("management/librarian/deneme", "LibrarianCtrl@denemeDB");
// Login page
Route::get("/auth/login", "LoginCtrl@getLogin");
Route::post("/auth/login", "LoginCtrl@postLogin");
Route::get("/auth/logout", "LoginCtrl@getLogout");

// Admin Page
Route::get("/management/admin", "AdminCtrl@index");
Route::get("/management/admin/reports", "AdminCtrl@reports");
Route::get("/management/admin/user-management", "AdminCtrl@userManagement");
Route::get("/management/admin/user-management/add", "AdminCtrl@userManagementAdd");
Route::post("/management/admin/user-management/add", "AdminCtrl@postUserManagementAdd");

//add post method 
Route::get("/management/admin/user-management/edit/{id}", "AdminCtrl@userManagementEdit");
Route::post("/management/admin/user-management/edit/{id}", "AdminCtrl@postUserManagementEdit");
//edit post method 
// remove post metod
Route::get("/management/admin/user-management/remove/{id}", "AdminCtrl@userManagementRemove");
