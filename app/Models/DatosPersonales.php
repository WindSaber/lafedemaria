<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DatosPersonales extends Model{
    public $table = 'datos_personales';
    public $fillable = ['nombre','apellido_paterno','apellido_materno'];
    public function invitados()    {
        return $this->hasMany('App\Models\Invitado');
    }
    public function integrantes()    {
        return $this->belongsTo('App\Models\Integrante');
    }
}