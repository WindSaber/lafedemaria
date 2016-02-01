<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Log;
use Response;
use Request;
use App\Models\DatosPersonales;
use App\Models\Invitado;
use App\Models\Movimiento;

class InvitadosController extends Controller {

    public function principal() {
        return Response::view('invitados.principal');
    }

    public function findAll() {
        $invitados = Invitado::with('datos_personales', 'forma_pago', 'ubicacion')->get(['*',DB::raw("coalesce((select sum(monto) from movimiento where entrada_salida = 'E' and invitado_id = invitado.id),0) as aportaciones")]);
        return Response::json($invitados);
    }

    public function save() {
        $invitado = Request::all();
        $datosPersonales = DatosPersonales::firstOrCreate($invitado['datos_personales']);
        $invitado['datos_personales_id'] = $datosPersonales->id;
        if ($invitado['addOrEdit'] == "add") {
            return Response::json(Invitado::create($invitado));
        } else {//If is edit
            $inv = Invitado::find($invitado['id']);
            $inv->fill($invitado);
            $inv->save();
            return Response::json($inv);
        }
    }

    public function invitaciones() {
        return Response::view('invitados.invitaciones');
    }

    public function invitacion() {
        $invitado = Request::all();
        $inv = Invitado::find($invitado['id']);
        $inv->fill($invitado);
        $inv->save();
        return Response::json($inv);
    }

    public function registrarPago() {
        return Response::view('invitados.registrarPago');
    }

    public function registraPago() {
        try {
            $arrMovimiento = Movimiento::crearArrayMovimientoConInvitadoyFecha(Request::get('movimiento'));
            $movimiento = Movimiento::create($arrMovimiento);
//            Request::file('comprobante')->move('../storage/comprobantes', $movimiento->id . "." .Request::file('comprobante')->guessExtension());
            Request::file('comprobante')->move('../storage/comprobantes', $movimiento->id . ".jpg");
            return Response::json("ok");
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            abort(500);
        }
    }
    public function historicoPagosPlain() {
        $invitado = Request::get('invitado');
        $movimientos = Movimiento::getAllPagosByInvitadoId($invitado['id']);
        return Response::json($movimientos);
    }

}
