<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookCtrl extends Controller
{
    function bookList(){
        return "Book List";
    }
    
    function bookAdd(){
        return "Book Add";
    }
    
    function postBookAdd(){
        
    }
    
    function bookEdit($levelId, $id){
        return "Book Edit $levelId - $id";
    }
    
    function postBookEdit(){
        
    }
    
    function bookRemove($levelId, $id){
        return "Book Remove $levelId - $id";
    }
    
    // Book Level Management
    function bookLevelList(){
        return "Book Level List";
    }
    
    function bookLevelAdd(){
        return "Book Level Add";
    }
    
    function postBookLevelAdd(){
        
    }
    
    function bookLevelEdit($id){
        return "Book Level Edit $id";
    }
    
    function postBookLevelEdit(){
        
    }
    
    function bookLevelRemove($id){
        return "Book Level Remove $id";
    }
    
}
