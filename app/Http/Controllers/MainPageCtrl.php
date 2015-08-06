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
    public function postSearch(Request $r){
        if ($r->input("araButonuKitap")){
            $this->searchBook($r);
        }else if ($r->input("araButonuSeviye")){
            $this->seachLevel($r);
        }else if($r->input(""))
    }
    public function searchBook(){ // search bölümünden available checkbox ı kaldır
        $bookName = $r->input("aranacakKitap");
        $books = DB::table("kitap_bilgi")
            ->where("KitapAdi", "=", $bookName)->get();
        return view("main.seach", ["books" => $books]);
    }
}
