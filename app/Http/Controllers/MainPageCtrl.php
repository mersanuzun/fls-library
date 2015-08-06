<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainPageCtrl extends Controller{
    public function index(){
        $bookLevels = DB::table('kitap_seviye_bilgi')
                ->get();
        return view("main.index", ['bookLevels' => $bookLevels]);
    }
    public function postSearchController(Request $r){
        if ($r->input("araButonuKitap")){
            return $this->searchBook($r);
        }else if ($r->input("araButonuSeviye")){
            return $this->searchLevel($r);
        }else if($r->input("araButonuYazar")){
            return $this->searchAuther($r);
        }
    }
    public function searchBook($r){
        $bookName = $r->input("aranacakKitap");
        if ($r->input("onlyAvailable")){
            $books = DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->where("KitapAdi", "LIKE", "%" . $bookName ."%")
                ->where("VarMi", "=", "1")
                ->get();
            //dd($books);
        }else{
            $books = DB::table("kitap_bilgi")
                ->join("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->where("KitapAdi", "LIKE", "%" . $bookName ."%")
                ->get();
        }
        return view("main.search")->with("books", $books);
    }
    public function searchLevel($r){
        if ($r->input("onlyAvailable")){
            $books = DB::table("kitap_bilgi")
            ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
            ->where("KitapSeviyeNo", "=", $r->input("seviyeSec"))
            ->where("VarMi", "=", "1")->get();
        }else{
            $books = DB::table("kitap_bilgi")
            
            
                ->join("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
            ->where("KitapSeviyeNo", "=", $r->input("seviyeSec"))->get();
        }
        return view("main.search")->with("books", $books);
    }
    public function searchAuther($r){
        if ($r->input("onlyAvailable")){
            $books = DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->where("YazarAdi", "LIKE", "%" . $r->input("aranacakYazar") ."%")
                ->where("VarMi", "=", "1")
                ->get();
        }else{
            $books = DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->where("YazarAdi", "LIKE", "%" . $r->input("aranacakYazar") ."%")
                ->get();
        }
        return view("main.search")->with("books", $books);
    }
}
