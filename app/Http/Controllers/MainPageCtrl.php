<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainPageCtrl extends Controller{
    public function index(){
        return view("mainpage.index");
    }
    public function search(){
        return view("mainpage.search");
    }
}
