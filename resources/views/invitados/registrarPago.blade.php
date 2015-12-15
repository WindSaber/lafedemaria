@extends('template')

@section('angularScripts')
{!! HTML::script('js/angular-app/InvitadosCtrl.js') !!}
<script>
    var rutaInvitado = "[[route('invitado')]]";
</script>
@stop

@section('contenido')
<div ng-controller='invitados.InvitadosCtrl' ng-init='recargaInvitados();'>
    <div class='col-md-9 col-sm-9 col-xs-9 col-lg-9'>
        @include('template.tablaInvitados',['display'=>['nombre','apellidoPaterno','apellidoMaterno','ubicacion',
            'invAceptada','registrarPago','consultarPagos']])
    </div>
    <div class='col-md-3 col-sm-3 col-xs-3 col-lg-3' ng-show="panelRegistrarPagoVisible">
        @include('invitados.panelRegistrarPago')
    </div>
</div>

@stop