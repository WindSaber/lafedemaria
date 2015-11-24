<?php
namespace App\Http\Controllers;
use Auth;
use Log;
use Response;
use Request;
use App\Models\DatosPersonales;
use App\Models\Integrante;

class LoginController extends Controller{
    public function login(){
        $username = Request::get('username');
        $password = Request::get('password');
        if(Auth::validate(['username'=>$username,'password'=>$password])){
            return "SI";
        }else{
            return "NO";
        }
   }
}

