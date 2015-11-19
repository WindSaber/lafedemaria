<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Servicio extends Model{
    public $table = 'servicio';
    public $fillable = ['nombre'];
}