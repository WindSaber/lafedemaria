<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model {

    public $table = 'movimiento';
    public $fillable = ['fecha', 'monto', 'entrada_salida', 'proveedor_id', 'invitado_id', 'observaciones'];
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
        return $arrMovimiento;
    }

}
