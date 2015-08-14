<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainPageCtrl extends Controller{
    public $value;
    public $request;
    public function index(){
        $bookLevels = DB::table('kitap_seviye_bilgi')
                ->get();
        return view("main.index", ['bookLevels' => $bookLevels]);
    }
    public function postSearchControl(Request $r){

        session(["bookName" => $r->input("aranacakKitap")]);
        session(["onlyAvailable" => $r->input("onlyAvailable")]);
        session(["level" => $r->input("seviyeSec")]);
        if ($r->input("araButonuKitap")){
            session(["searchType" => "araButonuKitap"]);
            return $this->searchBook($r);
        }else if ($r->input("araButonuSeviye")){
            session(["searchType" => "araButonuSeviye"]);
            return $this->searchLevel($r);
        }else if($r->input("araButonuYazar")){
            session(["searchType" => "araButonuSeviye"]);
            return $this->searchAuther($r);
        }
    }
    public function searchBook(){
        $bookName = session("bookName");
        if (session("onlyAvailable")){
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
    public function searchLevel(){
        $level = session("level");
        if (session("onlyAvailable")){
            $booksNumber = count(DB::table("kitap_bilgi")
            ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
            ->where("KitapSeviyeNo", "=", $level)
            ->where("VarMi", "=", "1")->get());
            
            $books = DB::table("kitap_bilgi")
            ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
            ->where("KitapSeviyeNo", "=", $level)
            ->where("VarMi", "=", "1")->paginate(10);
        }else{
            $booksNumber = count(DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->leftJoin("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
            ->where("kitap_bilgi.KitapSeviyeNo", "=", $level)->get());
            
            $books = DB::table("kitap_bilgi")
                ->join("kitap_seviye_bilgi", "kitap_bilgi.KitapSeviyeNo", "=", "kitap_seviye_bilgi.SeviyeNo")
                ->leftJoin("odunc", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
            ->where("kitap_bilgi.KitapSeviyeNo", "=", $level)->paginate(10);
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
    public function show(){
        if (session("searchType") && isset($_GET["searchButton"])){
            if ($_GET["searchButton"] == "bookName"){
                return $this->searchBook();
            }else if ($_GET["searchButton"] == "bookLevel"){
                return $this->searchLevel();
            }else {
                return $this->searchAuther();
            }
        }else {
            return redirect("/");
        }
        
    }
}
