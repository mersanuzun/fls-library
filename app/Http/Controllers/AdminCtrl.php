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
<<<<<<< HEAD
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        return view("admin.index");
=======
        if (!LoginCtrl::isEnter()) return redirect("/auth/login");
        $studentNumber = count(DB::table('ogrenci_bilgi')
                ->join('bolum_bilgi', 'bolum_bilgi.BolumKodu', '=', 'ogrenci_bilgi.OgrenciBolumKodu')
                ->get());
        $bookNumber = count(DB::table('kitap_bilgi')
                ->join('kitap_seviye_bilgi', 'kitap_bilgi.KitapSeviyeNo', '=', 'kitap_seviye_bilgi.SeviyeNo')
                ->get());
        $users = DB::table('kullanici_bilgi')
                ->join("kullanici_turu_bilgi", "kullanici_turu_bilgi.KullaniciTuruNo", "=", "kullanici_bilgi.KullaniciTuruNo")
                ->get();
        //echo $studentNumber . "  " . $bookNumber;
        return view("admin.index", ['studentNumber' => $studentNumber, 'bookNumber'=> $bookNumber, 'users' => $users]);
>>>>>>> a082a76bca8e1e61b3b40b2404d8fd6646b80482
        
    }

    // Admin Reports Page
    public function reports()
    {
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        return view("admin.reports");
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
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        $user = DB::table('kullanici_bilgi')
                ->where('KullaniciNo', "=", $id)
                ->first();
        return view("admin.user-manage-edit", ['user' => $user]);
    }
    
    public function userManagementRemove($id){
        if (!LoginCtrl::isEnter(1)) return redirect("/auth/login");
        DB::table("kullanici_bilgi")
            ->where("KullaniciNo", "=", $id)
            ->delete();
        return redirect("/management/admin/user-management");
    }

}
