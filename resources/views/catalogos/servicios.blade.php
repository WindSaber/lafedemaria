@extends('template')

@section('angularScripts')
{!! HTML::script('js/angular-app/CatalogosCtrl.js') !!}
<script>
    var rutaservicio = "[[route('servicio')]]";
</script>
@stop

@section('contenido')
<div class='col-md-12 col-sm-12 col-xs-12 col-lg-12'>
    @include('template.instrucciones')
</div>
<div ng-controller='catalogos.CatalogosCtrl' ng-init="recargaCatalogos('servicio')">
    <div class='col-md-4 col-sm-4 col-xs-4 col-lg-4' >
        <table class='table'>
            <tr>
                <td colspan="2" class='text-left'><button class='btn btn-primary' ng-click='nuevoCatalogo("servicio")'>Agregar un registro</button></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input id='nombre' type='text' class='form-control' ng-model='servicio.nombre' ng-enter="saveCatalogo('servicio')"/></td>
            </tr>
            <tr>
                <td colspan="2" class='text-right'>
                    <button class='btn btn-success' ng-disabled='botonSaveDisabled' ng-click="saveCatalogo('servicio')">Guardar</button>
                </td>
            </tr>
        </table>
    </div>
    <div class='col-md-8 col-sm-8 col-xs-8 col-lg-8'>
        <table class='table table-hover'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="ser in servicios" ng-click="editaCatalogo('servicio',ser,'nombre')">
                    <td>{{ser.id}}</td>
                    <td>{{ser.nombre}}</td>
                    <td><button class='btn btn-danger' ng-click="eliminaCatalogo('servicio', ser, $index)">Eliminar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop

@section('afterScripts')

@stop