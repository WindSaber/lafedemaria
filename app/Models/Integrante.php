<?php
namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class Integrante extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract{
    use Authenticatable, Authorizable, CanResetPassword;
    public $table = 'integrante';
    public $fillable = ['datos_personales_id','rol_id','ubicacion_responsable','celular',
        'telefono','facebook','password','username'];
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