<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Invitado extends Model{
    public $table = 'invitado';
    public $fillable = ['datos_personales_id','invitacion_impresa','invitacion_entregada','invitacion_aceptada',
        'referencia','forma_pago_id','ubicacion_id','observaciones'];
    public function datos_personales()    {
        return $this->belongsTo('App\Models\DatosPersonales');
    }
    public function forma_pago()    {
        return $this->belongsTo('App\Models\FormaPago');
    }
    public function ubicacion()    {
        return $this->belongsTo('App\Models\Ubicacion');
    }
}