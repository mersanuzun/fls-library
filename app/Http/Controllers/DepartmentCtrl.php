<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartmentCtrl extends Controller
{
    function departmentList(){
        return "Deparment List";
    }
    
    function departmentAdd(){
        return "Deparment Add";
    }
    
    function postDeparmentAdd(){
        
    }
    
    function departmentEdit($id){
        return "Deparment Edit $id";
    }
    
    function postDeparmentEdit(){
        
    }
    
    function departmentRemove($id){
        return "Deparment Remove $id";
    }

}
