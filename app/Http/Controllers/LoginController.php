<?php
namespace App\Http\Controllers;
use Auth;
use Log;
use Response;
use Request;
use Route;
use App\Models\DatosPersonales;
use App\Models\Integrante;

class LoginController extends Controller{
    public function login(){
        $username = Request::get('username');
        $password = Request::get('password');
        if(Auth::attempt(['username'=>$username,'password'=>$password])){
            return Response::json(Auth::user()->datos_personales);
        }else{
            return "No";
        }
   }
    public function logout(){
        Auth::logout();
        return redirect()->route('inicio');
   }
}

