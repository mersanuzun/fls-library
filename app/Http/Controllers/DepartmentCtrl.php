<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class DepartmentCtrl extends Controller
{
    function departmentList(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $departments = DB::table('bolum_bilgi')
                ->get();
       
        return view('department.index', ['departments' => $departments]);
    }
    
    function departmentAdd(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        
        return view('department.add');
    }
    
    function postDepartmentAdd(Request $r){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $depCode = $r->input("bolumKodu");
        $depName = $r->input("bolumAdi");
        $resultID = DB::table("bolum_bilgi")
            ->insert([
            "BolumKodu" => $depCode, 
            "BolumAdi" => $depName
        ]);
        if ($resultID){
            return redirect("/management/department");
        }else {
            session()->flash("message", "Department is not created.");
            return back();
        }
    }
    
    function departmentEdit($id){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $theDepartment = DB::table('bolum_bilgi')
                ->where('BolumKodu', $id)
                ->get();
        return view('department.edit', ['department' => $theDepartment]);
    }
    
    function postDepartmentEdit(Request $r){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $depCode = $r->input("bolumKodu");
        $depName = $r->input("bolumAdi");
        $resultID = DB::table("bolum_bilgi")
            ->where('bolumKodu', $depCode)
            ->update([
            "BolumAdi" => $depName
        ]);
        if ($resultID){
            return redirect("/management/department");
        }else {
            session()->flash("message", "Department is not edited.");
            return back();
        }
    }
    
    function departmentRemove($id){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        DB::table("bolum_bilgi")
            ->where("BolumKodu", $id)
            ->delete();
        return redirect("/management/department");
    }

}
