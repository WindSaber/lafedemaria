<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model {

    public $table = 'movimiento';
    public $fillable = ['fecha', 'monto','folio', 'entrada_salida', 'proveedor_id', 'invitado_id', 'observaciones'];
    protected $dates = ['created_at', 'updated_at', 'fecha'];

    //|--------------
    //|  Relaciones
    //|--------------
    public function proveedor() {
        return $this->belongsTo("App\Models\Proveedor");
    }

    public function Invitado() {
        return $this->belongsTo("App\Models\Invitado");
    }

    //|--------------
    //|  Metodos Format y DB
    //|--------------
    public static function crearArrayMovimientoConInvitadoyFecha($arrMovimiento) {
        $arrMovimiento['fecha'] = Carbon::createFromFormat('d/m/Y', $arrMovimiento['fecha']);
        $invitado = $arrMovimiento['invitado'];
        $arrMovimiento['invitado_id'] = $invitado['id'];
        $arrMovimiento['entrada_salida'] = 'E';
        return $arrMovimiento;
    }
    public static function getAllPagosByInvitadoId($idInvitado){
        return Movimiento::with('invitado','invitado.datos_personales')
                ->where('invitado_id','=',$idInvitado)
                ->where('entrada_salida','=','E')
                ->orderBy('fecha','desc')
                ->get();
    }

}
