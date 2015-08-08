<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class BookCtrl extends Controller
{
    function bookList(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");       
        $booksNumber = count(DB::table('kitap_bilgi')
                ->join('kitap_seviye_bilgi', 'kitap_bilgi.KitapSeviyeNo', '=', 'kitap_seviye_bilgi.SeviyeNo')
                ->get());
        
        $books = DB::table('kitap_bilgi')
                ->join('kitap_seviye_bilgi', 'kitap_bilgi.KitapSeviyeNo', '=', 'kitap_seviye_bilgi.SeviyeNo')
                ->paginate(10);
       
        return view('book.index', ['books' => $books, 'booksNumber' => $booksNumber]);
    }
    
    function bookAdd(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $bookLevels = DB::table('kitap_seviye_bilgi')
                ->get();
        
        return view('book.add', ['bookLevels' => $bookLevels]);
    }
    
    function postBookAdd(Request $r){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $bookNo = $r->input("kitapNo");
        $bookName = $r->input("kitapAdi");
        $authorName = $r->input("yazarAdi");
        $publisher = $r->input("yayinEvi");
        $bookLevel = mb_substr(trim($r->input("kitapSeviyesi")), -2, 1);
        $resultID = DB::table("kitap_bilgi")
            ->insert([
            "KitapSeviyeNo" => $bookLevel, 
            "KitapNo" => $bookNo,
            "KitapAdi" => $bookName,
            "YazarAdi" => $authorName,
            "YayinEvi" => $publisher,
            "VarMi" => 1
        ]);
        if ($resultID){
            return redirect("/management/book");
        }else {
            session()->flash("message", "Book is not created.");
            return back();
        }
    }
    
    function bookEdit($levelId, $id){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $theBook = DB::table('kitap_bilgi')
                ->where('KitapSeviyeNo', $levelId)
                ->where('KitapNo', $id)
                ->get();
        $bookLevels = DB::table('kitap_seviye_bilgi')
                ->get();
        return view('book.edit', ['book' => $theBook, 'bookLevels' => $bookLevels]);
    }
    
    function postBookEdit(Request $r){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $bookNo = $r->input("kitapNo");
        $bookName = $r->input("kitapAdi");
        $authorName = $r->input("yazarAdi");
        $publisher = $r->input("yayinEvi");
        $bookLevel = mb_substr(trim($r->input("kitapSeviyesi")), -2, 1);
        $resultID = DB::table("kitap_bilgi")
            ->where('KitapSeviyeNo', $bookLevel)
            ->where('KitapNo', $bookNo)
            ->update([
            "KitapAdi" => $bookName,
            "YazarAdi" => $authorName,
            "YayinEvi" => $publisher
        ]);
        if ($resultID){
            return redirect("/management/book");
        }else {
            session()->flash("message", "Book is not edited.");
            return back();
        }
    }
    
    function bookRemove($levelId, $id){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        DB::table("kitap_bilgi")
            ->where('KitapSeviyeNo', $levelId)
            ->where('KitapNo', $id)
            ->delete();
        return redirect("/management/book");
    }
    
    // Book Level Management
    function bookLevelList(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $bookLevelsNumber = count(DB::table('kitap_seviye_bilgi')
                ->get());
       
        $bookLevels = DB::table('kitap_seviye_bilgi')
                ->paginate(10);
       
        return view('book.level.index', ['bookLevels' => $bookLevels, 'bookLevelsNumber' => $bookLevelsNumber]);
    }
    
    function bookLevelAdd(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        
        return view('book.level.add');
    }
    
    function postBookLevelAdd(Request $r){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $bookLevelNo = $r->input("kitapSeviyeNo");
        $bookLevelName = $r->input("kitapSeviyeAdi");
        $resultID = DB::table("kitap_seviye_bilgi")
            ->insert([
            "SeviyeNo" => $bookLevelNo, 
            "SeviyeAdi" => $bookLevelName
        ]);
        if ($resultID){
            return redirect("/management/booklevel");
        }else {
            session()->flash("message", "Book Level is not created.");
            return back();
        }
    }
    
    function bookLevelEdit($id){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $theBookLevel = DB::table('kitap_seviye_bilgi')
                ->where('SeviyeNo', $id)
                ->get();
        return view('book.level.edit', ['bookLevel' => $theBookLevel]);
    }
    
    function postBookLevelEdit(Request $r){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $bookLevelNo = $r->input("kitapSeviyeNo");
        $bookLevelName = $r->input("kitapSeviyeAdi");
        $resultID = DB::table("kitap_seviye_bilgi")
            ->where('SeviyeNo', $bookLevelNo)
            ->update([
            "SeviyeAdi" => $bookLevelName
        ]);
        if ($resultID){
            return redirect("/management/booklevel");
        }else {
            session()->flash("message", "Book Level is not edited.");
            return back();
        }
    }
    
    function bookLevelRemove($id){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        DB::table("kitap_seviye_bilgi")
            ->where('SeviyeNo', $id)
            ->delete();
        return redirect("/management/booklevel");
    }
    
}
