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

// Admin Page
Route::get("/management/admin", "AdminCtrl@index");
Route::get("/management/admin/user-management", "AdminCtrl@userManagement");
Route::get("/management/admin/user-management/add", "AdminCtrl@userManagementAdd");
//add post method 
Route::get("/management/admin/user-management/edit/{id}", "AdminCtrl@userManagementEdit");
//edit post method 
// remove post metod
Route::get("/management/admin/user-management/remove/{id}", "AdminCtrl@userManagementEdit");