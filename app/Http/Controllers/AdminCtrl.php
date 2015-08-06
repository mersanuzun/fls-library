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
        $users = DB::table("kullanici_turu_bilgi")->get();
        return view("admin.user-manage-add")->with("users", $users);
    }
    public function postUserManagementAdd(Request $r){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $username = $r->input("kullaniciAdi");
        $password = $r->input("sifre");
        $userType = $r->input("kullaniciSecim");
        $result = DB::table("kullanici_bilgi")
            ->where("KullaniciAdi", "=", $username)
            ->get();
        if ($result) {
            session()->flash("message", "Username is used.");
            return back();
        }else{
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
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $user = DB::table('kullanici_bilgi')
                ->where('KullaniciNo', "=", $id)
                ->first();
        return view("admin.user-manage-edit", ['user' => $user]);
    }
    
    public function userManagementRemove($id){
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        DB::table("kullanici_bilgi")
            ->where("KullaniciNo", "=", $id)
            ->delete();
        return redirect("/management/admin/user-management");
    }

}
