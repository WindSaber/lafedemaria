<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Integrante extends Model{
    public $table = 'integrante';
    public $fillable = ['datos_personales_id','rol_id','ubicacion_responsable','celular',
        'telefono','facebook','password'];
    public function datos_personales()    {
        return $this->belongsTo('App\Models\DatosPersonales');
    }
    public function ubicacion()    {
        return $this->belongsTo('App\Models\Ubicacion','ubicacion_responsable');
    }
    public function rol()    {
        return $this->belongsTo('App\Models\Rol');
    }
}