@extends('template')

@section('angularScripts')
{!! HTML::script('js/angular-app/InvitadosCtrl.js') !!}
<script>
    var rutaInvitado = "[[route('integrante')]]";
    var rutaubicacion = "[[route('ubicacion')]]";
//    var rutaformaPago = "[[route('formaPago')]]";
    var rutarol = "[[route('rol')]]";
</script>
@stop

@section('contenido')
<div ng-controller='invitados.InvitadosCtrl' ng-init='recargaInvitados();'>
    <div class='col-md-12 col-sm-12 col-xs-12 col-lg-12'>
        <button class='btn btn-primary'  data-toggle="modal" data-target="#modalAgregarInvitado" ng-click='nuevoInvitado()'>Agregar integrante</button>
        @include('template.tablaInvitados',['display'=>['username','nombre','apellidoPaterno','apellidoMaterno','ubicacion',
            'invImpresa','invEntregada','invAceptada','observaciones','acciones']])
    </div>
    @include('modales.agregarIntegrante')
</div>

@stop