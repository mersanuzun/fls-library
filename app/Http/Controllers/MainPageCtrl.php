<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MainPageCtrl extends Controller{
    public function index(){
        $bookLevels = DB::table('kitap_seviye_bilgi')
                ->get();

        return view("main.index", ['bookLevels' => $bookLevels]);
    }
    public function search(){
        return view("main.search");
    }
    public function postSearch(Request $r){
        if ($r->input("araButonuKitap")){
            $this->searchBook($r);
        }else if ($r->input("araButonuSeviye")){
            $this->seachLevel($r);
        }else if($r->input(""));
    }
    public function searchBook(){ // search bölümünden available checkbox ı kaldır
        $bookName = $r->input("aranacakKitap");
        $books = DB::table("kitap_bilgi")
            ->where("KitapAdi", "=", $bookName)->get();
        return view("main.seach", ["books" => $books]);
    }
}
