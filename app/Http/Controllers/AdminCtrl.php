<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminCtrl extends Controller{
    public $err = null; // using for error handling
    
    // Admin Index Page
    public function index(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        return view("admin.index");
        
    }

    // Admin Reports Page
    public function reports()
    {
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        return view("admin.reports");
    }
    
    //Admin User Management Page
    public function userManagement(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $users = DB::table('kullanici_bilgi')
                ->join("kullanici_turu_bilgi", "kullanici_turu_bilgi.KullaniciTuruNo", "=", "kullanici_bilgi.KullaniciTuruNo")
                ->get();
        
        return view("admin.user-manage", ['users' => $users]);
    }
    
    public function userManagementAdd(){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        return view("admin.user-manage-add");
    }
    public function postUserManagementAdd(Request $r){
        $username = $r->input("kullaniciAdi");
        $password = $r->input("sifre");
        $userType = $r->input("kullaniciSecim");
        $resultID = DB::table("kullanici_bilgi")
            ->insertGetId([
            "KullaniciTuruNo" => $userType, 
            "KullaniciAdi" => $username,
            "KullaniciSifre" => $password
        ]);
        if ($resultID){
            return redirect("/management/admin/user-management");
        }else {
            session()->flash("message", "User is not created.");
            return back();
        }
    }
    public function postUserManagementEdit(Request $r, $kullaniciNo){
        $newPassword = $r->input("yeniSifre");
        $newPasswordAgain = $r->input("yeniSifreTekrar");
        if ($newPassword != $newPasswordAgain){
            session()->flash("message", "The passwords are not match.");
            return back();
        }
        DB::table("kullanici_bilgi")
            ->where("KullaniciNo", "=", $kullaniciNo)
            ->update(["KullaniciSifre" => $newPassword]);
        return redirect("/management/admin/user-management");
    }
    public function userManagementEdit($id){
        $user = DB::table('kullanici_bilgi')
                ->where('KullaniciNo', "=", $id)
                ->first();
        return view("admin.user-manage-edit", ['user' => $user]);
    }
    
    public function userManagementRemove($id){
        DB::table("kullanici_bilgi")
            ->where("KullaniciNo", "=", $id)
            ->delete();
        return redirect("/management/admin/user-management");
    }

}
