<?php
namespace App\Http\Controllers;
use Log;
use Hash;
use Response;
use Request;
use App\Models\DatosPersonales;
use App\Models\Integrante;
class IntegrantesController extends Controller{
    public function principal(){
        return Response::view('integrantes.principal');
    }
    public function findAll(){
        $integrantes = Integrante::with('datos_personales','rol','ubicacion')->get();
        return Response::json($integrantes);
    }
    public function save(){
        $integrante = Request::all();
        $datosPersonales = DatosPersonales::firstOrCreate($integrante['datos_personales']);
        $integrante['datos_personales_id'] = $datosPersonales->id;
        if($integrante['addOrEdit']=="add"){
            $integrante['password'] = Hash::make($integrante['password']);
            return Response::json(Integrante::create($integrante));
        }else{//If is edit
            $inv = Integrante::find($integrante['id']);
            $inv->fill($integrante);
            $inv->save();
            return Response::json($inv);
        }
    }
}