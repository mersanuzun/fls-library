<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginCtrl;
class LibrarianCtrl extends Controller{
    public $err = null;
    public function index(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $undelivered = [];
        $today = date("Y-m-d");
        $delivered = DB::table("odunc")
                    ->join("ogrenci_bilgi", "ogrenci_bilgi.OgrenciNo", "=", "odunc.OgrenciNo")
                    ->join("kitap_bilgi", "odunc.KitapNo", "=", 
                           DB::raw("kitap_bilgi.KitapNo and odunc.KitapSeviyeNo =" . "kitap_bilgi.KitapSeviyeNo"))
                    ->where("PlanlananVerilisTarihi", "<", $today)
                    ->get();
        foreach($delivered as $data){
            if ($data->TeslimEdilenTarihi) continue;
            else array_push($undelivered, $data);
        }
        return view("librarian.index", ["undelivered" => $undelivered]);
    }
    public function circulation(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        return view("librarian.circulation");
    }
    public function circulationControl(Request $r){
        if ($r->input("startCirculation")){
            $this->startCirculation($r);
        }elseif ($r->input("finishCirculation")){
            $this->finishCirculation($r);
        }
        //return view("librarian.circulation");
        return redirect("/management/librarian/circulation")->with("err", "ersan");
    }
    public function startCirculation($r){
        $bookNo = $r->input("bookNo");
        $bookLevel = $r->input("bookLevel");
        $studentNo = $r->input("studentNo");
        $startDate = $r->input("startDate");
        $estimatedFinishDate = $r->input("estimatedFinishDate");
        if (!is_numeric($bookNo) || !is_numeric($bookLevel) || !is_numeric($studentNo)){
            session(["message" => "Hata"]);
            return;
        }
        $bookStatus = DB::table("kitap_bilgi")
                        ->where("KitapNo", DB::raw($bookNo . 
                                " and KitapSeviyeNo = " . $bookLevel))->get();
        $studentStatus = DB::table("ogrenci_bilgi")
                        ->where("OgrenciNo", "=", $studentNo)->get();
        if ($studentStatus){
            if ($bookStatus){
                if ($bookStatus[0]->VarMi == 0) $message = "The book is not in library.";
                else {
                    DB::table("odunc")
                            ->insert(
                    ["OgrenciNo"=>$studentNo, "KitapNo"=>$bookNo, "KitapSeviyeNo"=>$bookLevel,
                     "VerilisTarihi"=>$startDate, "PlanlananVerilisTarihi"=>$estimatedFinishDate]);
                    DB::table("kitap_bilgi")
                        ->where("KitapNo", DB::raw($bookNo . " and KitapSeviyeNo = " . $bookLevel))
                        ->update(["VarMi"=>0]);
                    $message = "The process is succesfull";
                }
            }else {
                $message = "There is no such that book.";
            }    
        }else {
            $message = "There is no such that student.";
        }
        session()->flash("message", $message);
    }
    public function finishCirculation($r){
        $bookNo = $r->input("deliveredBookNo");
        $bookLevel = $r->input("deliveredBookLevel");
        $studentNo = $r->input("deliveredStudentNo");
        $finishDate = $r->input("finishDate");
        if (!is_numeric($bookNo) || !is_numeric($bookLevel) || !is_numeric($studentNo)){
            session(["message" => "Hata"]);
            return;
        }
        $studentStatus = DB::table("ogrenci_bilgi")
                        ->where("OgrenciNo", "=", $studentNo)->get();
        $bookStatus = DB::table("kitap_bilgi")
                        ->where("KitapNo", DB::raw($bookNo . 
                                " and KitapSeviyeNo = " . $bookLevel))->get();
        if ($studentStatus){
            if ($bookStatus){
                if ($bookStatus[0]->VarMi == 1) $this->err = "The book is in library.";
                else {
                    $finishBook = DB::table("odunc")
                        ->where("OgrenciNo", DB::raw($studentNo . " and KitapSeviyeNo = ". $bookLevel. " and KitapNo = " . $bookNo))
                        ->orderBy("OduncNo", "desc")->get();
                    DB::table("odunc")
                        ->where("OduncNo", "=", $finishBook[0]->OduncNo)
                        ->Update(["TeslimEdilenTarihi"=>$finishDate]);
                    DB::table("kitap_bilgi")
                        ->where("KitapNo", DB::raw($bookNo . " and KitapSeviyeNo = " . $bookLevel))
                        ->update(["VarMi"=>1]);
                    $message = "The process is succesfull";
                }
            }else {
                $message = "There is no such that book.";
            }
        }else{
            $message = "There is no such that student";
        }
        session()->flash("message", $message);
    }
    public function denemeDB(){
        session(["message"=>"ersan"]);
        return redirect("/auth/login")->with("message", "ersan");
    }
}
