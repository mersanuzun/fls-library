<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

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
        $users = DB::table('kullanici_bilgi')
                ->where('KullaniciTuruNo', '!=', '1')
                ->get();
        
        return view("admin.user-manage", ['users' => $users]);
    }
    
    public function userManagementAdd(){
        return view("admin.user-manage-add");
    }
    
    public function userManagementEdit($id){
        $user = DB::table('kullanici_bilgi')
                ->where('KullaniciNo', "=", $id)
                ->get();
        
        return view("admin.user-manage-edit", ['user' => $user[0]]);
    }
    
    public function userManagementRemove($id){
        return view("admin.user-manage-remove");
    }

}
