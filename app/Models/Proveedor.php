<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Proveedor extends Model{
    public $table = 'proveedor';
    public $fillable = ['nombre','responsable','celular','telefono1','telefono2','email','observaciones'];
}