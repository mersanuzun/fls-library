<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginCtrl extends Controller{
    
    public static function passCrypt($pass){
        $passOrder = array("md5", "sha1", "md5", "sha1");
        foreach ($passOrder as $alg) {
            $pass = $alg($pass);
        }
        return $pass;
    }
    
    public function getLogin(){
        return $this->check();
    }
    
    public function postLogin(Request $r){
        $username = $r->input("username");
        $password = $this->passCrypt($r->input("password"));
        $userDB = DB::table("kullanici_bilgi")
            ->where("KullaniciAdi", "=", $username)->get();
        if ($userDB){
            if (($username == $userDB[0]->KullaniciAdi) && ($password == $userDB[0]->KullaniciSifre)){
                session(["auth" => $userDB[0]->KullaniciTuruNo]);
                session(["username" => $userDB[0]->KullaniciAdi]);
            }else {
                echo "Authentication is not success.";
            }
        }else {
            echo "Authentication is not success.";
        }
        return $this->check();
    }
    
    private function check(){
        if (session("auth") == 1){
            return redirect("/management/admin");
        }else if (session("auth") == 2) {
            return redirect("/management/librarian");
        }
        return view("/auth/login");
    }
    
    public static function isEnter($id){
        if (session()->has("auth")){
            if (session("auth") == $id){
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }
    
    public function getLogout(){
        session()->forget('auth');
        session()->forget("username");
        return redirect("/");
    }
}
