<?php
namespace App\Http\Controllers;
use Log;
use Response;
use Request;
use App\Models\DatosPersonales;
use App\Models\Invitado;
class InvitadosController extends Controller{
    public function principal(){
        return Response::view('invitados.principal');
    }
    public function findAll(){
        $invitados = Invitado::with('datos_personales','forma_pago','ubicacion')->get();
        return Response::json($invitados);
    }
    public function save(){
        $invitado = Request::all();
        $datosPersonales = DatosPersonales::firstOrCreate($invitado['datos_personales']);
        $invitado['datos_personales_id'] = $datosPersonales->id;
        if($invitado['addOrEdit']=="add"){
            return Response::json(Invitado::create($invitado));
        }else{//If is edit
            $inv = Invitado::find($invitado['id']);
            $inv->fill($invitado);
            $inv->save();
            return Response::json($inv);
        }
    }
    public function invitaciones(){
        return Response::view('invitados.invitaciones');
    }
    public function invitacion(){
        $invitado = Request::all();
        $inv = Invitado::find($invitado['id']);
        $inv->fill($invitado);
        $inv->save();
        return Response::json($inv);
    }
}