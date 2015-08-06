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

// General Pages
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
Route::get("/management/admin/user-management/edit/{id}", "AdminCtrl@userManagementEdit");
Route::post("/management/admin/user-management/edit/{id}", "AdminCtrl@postUserManagementEdit");
Route::get("/management/admin/user-management/remove/{id}", "AdminCtrl@userManagementRemove");

// Student Management
Route::get("/management/student", "StudentCtrl@studentList");
Route::get("/management/student/add", "StudentCtrl@studentAdd");
Route::post("/management/student/add", "StudentCtrl@postStudentAdd");
Route::get("/management/student/edit/{id}", "StudentCtrl@studentEdit");
Route::post("/management/student/edit/{id}", "StudentCtrl@postStudentEdit");
Route::get("/management/student/remove/{id}", "StudentCtrl@studentRemove");

// Department Management
Route::get("/management/department", "DepartmentCtrl@departmentList");
Route::get("/management/department/add", "DepartmentCtrl@departmentAdd");
Route::post("/management/department/add", "DepartmentCtrl@postDepartmentAdd");
Route::get("/management/department/edit/{id}", "DepartmentCtrl@departmentEdit");
Route::post("/management/department/edit/{id}", "DepartmentCtrl@postDepartmentEdit");
Route::get("/management/department/remove/{id}", "DepartmentCtrl@departmentRemove");

// Book Management
Route::get("/management/book", "BookCtrl@bookList");
Route::get("/management/book/add", "BookCtrl@bookAdd");
Route::post("/management/book/add", "BookCtrl@postBookAdd");
Route::get("/management/book/edit/{levelid}-{id}", "BookCtrl@bookEdit");
Route::post("/management/book/edit/{levelid}-{id}", "BookCtrl@postBookEdit");
Route::get("/management/book/remove/{levelid}-{id}", "BookCtrl@bookRemove");

// Book Level Management
Route::get("/management/booklevel", "BookCtrl@bookLevelList");
Route::get("/management/booklevel/add", "BookCtrl@bookLevelAdd");
Route::post("/management/booklevel/add", "BookCtrl@postBookLevelAdd");
Route::get("/management/booklevel/edit/{id}", "BookCtrl@bookLevelEdit");
Route::post("/management/booklevel/edit/{id}", "BookCtrl@postBookLevelEdit");
Route::get("/management/booklevel/remove/{id}", "BookCtrl@bookLevelRemove");
//<--- End Book Management
