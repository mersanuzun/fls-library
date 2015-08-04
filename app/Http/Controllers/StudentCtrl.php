<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentCtrl extends Controller
{
    function studentList(){
        return "Student List";
    }
    
    function studentAdd(){
        return "Student Add";
    }
    
    function postStudentAdd(){
        
    }
    
    function studentEdit($id){
        return "Student Edit $id";
    }
    
    function postStudentEdit(){
        
    }
    
    function studentRemove($id){
        return "Student Remove $id";
    }

}
