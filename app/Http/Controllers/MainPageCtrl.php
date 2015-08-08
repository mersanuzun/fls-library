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
            $booksNumber = count(DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->where("KitapAdi", "LIKE", "%" . $bookName ."%")
                ->where("VarMi", "=", "1")
                ->get());
            
            $books = DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->where("KitapAdi", "LIKE", "%" . $bookName ."%")
                ->where("VarMi", "=", "1")
                ->paginate(10);
        }else{
            $booksNumber = count(DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->leftJoin("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
                ->where("KitapAdi", "LIKE", "%" . $bookName ."%")
                ->get());
            
            $books = DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->leftJoin("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
                ->where("KitapAdi", "LIKE", "%" . $bookName ."%")
                ->paginate(10);
        }
        return view("main.search", ['books' => $books, 'booksNumber' => $booksNumber]);
        //return view("main.search")->with("books", $books)->with('booksNumber', $booksNumber);
    }
    public function searchLevel($r){
        if ($r->input("onlyAvailable")){
            $booksNumber = count(DB::table("kitap_bilgi")
            ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
            ->where("KitapSeviyeNo", "=", $r->input("seviyeSec"))
            ->where("VarMi", "=", "1")->get());
            
            $books = DB::table("kitap_bilgi")
            ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
            ->where("KitapSeviyeNo", "=", $r->input("seviyeSec"))
            ->where("VarMi", "=", "1")->paginate(10);
        }else{
            $booksNumber = count(DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->leftJoin("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
            ->where("kitap_bilgi.KitapSeviyeNo", "=", $r->input("seviyeSec"))->get());
            
            $books = DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->leftJoin("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
            ->where("kitap_bilgi.KitapSeviyeNo", "=", $r->input("seviyeSec"))->paginate(10);
        }
        return view("main.search", ['books' => $books, 'booksNumber' => $booksNumber]);
        //return view("main.search")->with("books", $books)->with('booksNumber', $booksNumber);
    }
    public function searchAuther($r){
        if ($r->input("onlyAvailable")){
            $booksNumber = count(DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->where("YazarAdi", "LIKE", "%" . $r->input("aranacakYazar") ."%")
                ->where("VarMi", "=", "1")
                ->get());
            
            $books = DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->where("YazarAdi", "LIKE", "%" . $r->input("aranacakYazar") ."%")
                ->where("VarMi", "=", "1")
                ->paginate(10);
        }else{
            $booksNumber = count(DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->leftJoin("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
                ->where("YazarAdi", "LIKE", "%" . $r->input("aranacakYazar") ."%")
                ->get());
            
            $books = DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->leftJoin("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
                ->where("YazarAdi", "LIKE", "%" . $r->input("aranacakYazar") ."%")
                ->paginate(10);
        }
        return view("main.search", ['books' => $books, 'booksNumber' => $booksNumber]);
        //return view("main.search")->with("books", $books)->with('booksNumber', $booksNumber);
    }
}
