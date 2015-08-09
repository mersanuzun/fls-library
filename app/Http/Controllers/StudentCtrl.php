<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class StudentCtrl extends Controller
{
    function studentList(){
        if (!LoginCtrl::isEnter(2)) return redirect("/auth/login");
        $students = DB::table('ogrenci_bilgi')
                ->join('bolum_bilgi', 'bolum_bilgi.BolumKodu', '=', 'ogrenci_bilgi.OgrenciBolumKodu')
                ->get();
       
        return view('student.index', ['students' => $students]);
    }
    
    function studentAdd(){
        if (!LoginCtrl::isEnter(2)) return redirect("/auth/login");
        $departments = DB::table('bolum_bilgi')
                ->get();
        
        return view('student.add', ['departments' => $departments]);
    }
    
    function postStudentAdd(Request $r){
        if (!LoginCtrl::isEnter(2)) return redirect("/auth/login");
        $studentNumber = $r->input("ogrenciNo");
        $studentName = $r->input("ogrenciAdi");
        $studentSurname = $r->input("ogrenciSoyadi");
        $studentClass = $r->input("ogrenciSinif");
        $studentDeparment = mb_substr(trim($r->input("ogrenciBolumKodu")), -4);
        $resultID = DB::table("ogrenci_bilgi")
            ->insert([
            "OgrenciNo" => $studentNumber, 
            "OgrenciAdi" => $studentName,
            "OgrenciSoyadi" => $studentSurname,
            "OgrenciBolumKodu" => $studentDeparment,
            "OgrenciSinif" => $studentClass
        ]);
        if ($resultID){
            return redirect("/management/student");
        }else {
            session()->flash("message", "Student is not created.");
            return back();
        }
    }
    
    function studentEdit($id){
        if (!LoginCtrl::isEnter(2)) return redirect("/auth/login");
        $theStudent = DB::table('ogrenci_bilgi')
                ->where('OgrenciNo', $id)
                ->get();
        $departments = DB::table('bolum_bilgi')
                ->get();
        return view('student.edit', ['student' => $theStudent, 'departments' => $departments]);
    }
    
    function postStudentEdit(Request $r){
        if (!LoginCtrl::isEnter(2)) return redirect("/auth/login");
        $studentNumber = $r->input("ogrenciNo");
        $studentName = $r->input("ogrenciAdi");
        $studentSurname = $r->input("ogrenciSoyadi");
        $studentClass = $r->input("ogrenciSinif");
        $studentDeparment = mb_substr(trim($r->input("ogrenciBolumKodu")), -4);
        $resultID = DB::table("ogrenci_bilgi")
            ->where('OgrenciNo', $studentNumber)
            ->update([
            "OgrenciAdi" => $studentName,
            "OgrenciSoyadi" => $studentSurname,
            "OgrenciBolumKodu" => $studentDeparment,
            "OgrenciSinif" => $studentClass
        ]);
        if ($resultID){
            return redirect("/management/student");
        }else {
            session()->flash("message", "Student is not edited.");
            return back();
        }
    }
    
    function studentRemove($id){
        if (!LoginCtrl::isEnter(2)) return redirect("/auth/login");
        DB::table("ogrenci_bilgi")
            ->where("OgrenciNo", $id)
            ->delete();
        return redirect("/management/student");
    }

}
