@extends('template')

@section('titulo') La Fe de María nos Une @stop

@section('contenido')
<div class="col-md-2 col-xs-2 col-lg-2 col-sm-2 col-md-offset-3 col-lg-offset-3 col-lg-offset-3 col-xs-offset-3">
    {!! HTML::image('images/virgen.jpg', 'Virgen de la fe', array('class'=>'img-responsive')) !!}
</div>
<div class="col-md-4 col-xs-4 col-lg-4 col-sm-4">
    <div class='panel panel-info'>
        <div class='panel-heading'><b>Informaci&oacute;n importante</b></div>
        <div class='panel-body'>
            <p class='text-justify'><b>Reuniones</b></p>
            <ol>
                <li>22 Noviembre para invitar</li>
                <li>22 Noviembre para invitar</li>
                <li>22 Noviembre para invitar</li>
            </ol>
            <p class='text-justify'>
                <b>Tu apoyo es importante</b><br/>
                No olvides que tu colaboración es indispensable para el funcionamiento de esta festividad
            </p>
            <p class='text-justify'>
                <b>Se buscan proveedores</b><br/>
            <ul>
                <li>Cohetes</li>
                <li>Globos de cantoya</li>
                <li>M&uacute;sica</li>
            </ul>
            </p>

        </div>
    </div>
</div>
@stop