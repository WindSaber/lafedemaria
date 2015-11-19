<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class FormaPago extends Model{
    public $table = 'forma_pago';
    public $fillable = ['nombre'];
}