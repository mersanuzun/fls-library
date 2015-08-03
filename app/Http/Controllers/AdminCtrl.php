<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminCtrl extends Controller{
    public $err = null; // using for error handling
    
    // Admin Index Page
    public function index(){
        
        return view("admin.index");
        
    }

    // Admin Reports Page
    public function reports()
    {
        // to do 
    }
    
    //Admin User Management Page
    public function userManagement(){
        return view("admin.user-manage");
    }
    
    public function userManagementAdd(){
        
    }
    
    public function userManagementEdit(){
        
    }
    
    public function userManagementRemove(){
        
    }

}
