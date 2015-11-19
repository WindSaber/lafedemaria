@extends('template')

@section('angularScripts')
{!! HTML::script('js/angular-app/CatalogosCtrl.js') !!}
<script>
    var rutarol = "[[route('rol')]]";
</script>
@stop

@section('contenido')
<div class='col-md-12 col-sm-12 col-xs-12 col-lg-12'>
    @include('template.instrucciones')
</div>
<div ng-controller='catalogos.CatalogosCtrl' ng-init="recargaCatalogos('rol')">
    <div class='col-md-4 col-sm-4 col-xs-4 col-lg-4' >
        <table class='table'>
            <tr>
                <td colspan="2" class='text-left'><button class='btn btn-primary' ng-click='nuevoCatalogo("rol")'>Agregar un registro</button></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input id='nombre' type='text' class='form-control' ng-model='rol.nombre' ng-enter="saveCatalogo('rol')"/></td>
            </tr>
            <tr>
                <td colspan="2" class='text-right'>
                    <button class='btn btn-success' ng-disabled='botonSaveDisabled' ng-click="saveCatalogo('rol')">Guardar</button>
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="cat in rols" ng-click="editaCatalogo('rol',cat,'nombre')">
                    <td>{{cat.id}}</td>
                    <td>{{cat.nombre}}</td>
                    <td><button class='btn btn-danger' ng-click="eliminaCatalogo('rol', cat, $index)">Eliminar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop

@section('afterScripts')

@stop