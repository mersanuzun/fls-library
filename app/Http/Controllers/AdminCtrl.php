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
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        $studentNumber = count(DB::table('ogrenci_bilgi')
                ->join('bolum_bilgi', 'bolum_bilgi.BolumKodu', '=', 'ogrenci_bilgi.OgrenciBolumKodu')
                ->get());
        $bookNumber = count(DB::table('kitap_bilgi')
                ->join('kitap_seviye_bilgi', 'kitap_bilgi.KitapSeviyeNo', '=', 'kitap_seviye_bilgi.SeviyeNo')
                ->get());
        $users = DB::table('kullanici_bilgi')
                ->join("kullanici_turu_bilgi", "kullanici_turu_bilgi.KullaniciTuruNo", "=", "kullanici_bilgi.KullaniciTuruNo")
                ->get();
        return view("admin.index", ['studentNumber' => $studentNumber, 'bookNumber'=> $bookNumber, 'users' => $users]);
        
    }
    
    //Admin User Management Page
    public function userManagement(){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        $users = DB::table('kullanici_bilgi')
                ->join("kullanici_turu_bilgi", "kullanici_turu_bilgi.KullaniciTuruNo", "=", "kullanici_bilgi.KullaniciTuruNo")
                ->get();
        
        return view("admin.user-manage", ['users' => $users]);
    }
    
    public function userManagementAdd(){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        $users = DB::table("kullanici_turu_bilgi")->get();
        
        return view("admin.user-manage-add")->with("users", $users);
    }
    
    public function postUserManagementAdd(Request $r){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        $username = $r->input("kullaniciAdi");
        $password = LoginCtrl::passCrypt($r->input("sifre"));
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

    public function userManagementEdit($id){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        $user = DB::table('kullanici_bilgi')
                ->where('KullaniciNo', "=", $id)
                ->first();
        return view("admin.user-manage-edit", ['user' => $user]);
    }
    
    public function postUserManagementEdit(Request $r, $kullaniciNo){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        $newPassword = LoginCtrl::passCrypt($r->input("yeniSifre"));
        $newPasswordAgain = LoginCtrl::passCrypt($r->input("yeniSifreTekrar"));
        if ($newPassword != $newPasswordAgain){
            session()->flash("message", "The passwords are not match.");
            return back();
        }
        DB::table("kullanici_bilgi")
            ->where("KullaniciNo", "=", $kullaniciNo)
            ->update(["KullaniciSifre" => $newPassword]);
        
        return redirect("/management/admin/user-management");
    }
    
    public function userManagementRemove($id){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        DB::table("kullanici_bilgi")
            ->where("KullaniciNo", "=", $id)
            ->delete();
        
        return redirect("/management/admin/user-management");
    }

        // Admin Advance Manage Page
    public function advanceManage(){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        
        return view("admin.advance-manage");
    }
    
    //Student Records deletion
    public function clearStudentRecords(){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        DB::table("ogrenci_bilgi")
            ->delete();
        
        return redirect("/management/admin/advance-manage");
        
    }
    
    //Circulation Records deletion
    public function clearCirculationRecords(){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        DB::table("odunc")
            ->delete();
        
        return redirect("/management/admin/advance-manage");
        
    }
    
}
