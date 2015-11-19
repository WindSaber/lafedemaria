@extends('template')

@section('angularScripts')
{!! HTML::script('js/angular-app/CatalogosCtrl.js') !!}
<script>
    var rutaproveedor = "[[route('proveedor')]]";
</script>
@stop

@section('contenido')
<div class='col-md-12 col-sm-12 col-xs-12 col-lg-12'>
    @include('template.instrucciones')
</div>
<div ng-controller='catalogos.CatalogosCtrl' ng-init="recargaCatalogos('proveedor')">
    <div class='col-md-4 col-sm-4 col-xs-4 col-lg-4' >
        <table class='table'>
            <tr>
                <td colspan="2" class='text-left'><button class='btn btn-primary' ng-click='nuevoCatalogo("servicio")'>Agregar un registro</button></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input id='nombre' type='text' class='form-control' ng-model='proveedor.nombre' ng-enter="saveCatalogo('proveedor')"/></td>
            </tr>
            <tr>
                <td>Responsable:</td>
                <td><input id='nombre' type='text' class='form-control' ng-model='proveedor.responsable' ng-enter="saveCatalogo('proveedor')"/></td>
            </tr>
            <tr>
                <td>Celular:</td>
                <td><input id='nombre' type='text' class='form-control' ng-model='proveedor.celular' ng-enter="saveCatalogo('proveedor')"/></td>
            </tr>
            <tr>
                <td>Telefono1:</td>
                <td><input id='nombre' type='text' class='form-control' ng-model='proveedor.telefono1' ng-enter="saveCatalogo('proveedor')"/></td>
            </tr>
            <tr>
                <td>Telefono2:</td>
                <td><input id='nombre' type='text' class='form-control' ng-model='proveedor.telefono2' ng-enter="saveCatalogo('proveedor')"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input id='nombre' type='text' class='form-control' ng-model='proveedor.email' ng-enter="saveCatalogo('proveedor')"/></td>
            </tr>
            <tr>
                <td>Observaciones:</td>
                <td><input id='nombre' type='text' class='form-control' ng-model='proveedor.observaciones' ng-enter="saveCatalogo('proveedor')"/></td>
            </tr>
            <tr>
                <td colspan="2" class='text-right'>
                    <button class='btn btn-success' ng-disabled='botonSaveDisabled' ng-click="saveCatalogo('proveedor')">Guardar</button>
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
                    <th>Responsable</th>
                    <th>Celular</th>
                    <th>Telefono1</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="prov in proveedors" ng-click="editaCatalogo('proveedor',prov,'nombre')">
                    <td>{{prov.id}}</td>
                    <td>{{prov.nombre}}</td>
                    <td>{{prov.responsable}}</td>
                    <td>{{prov.celular}}</td>
                    <td>{{prov.telefono1}}</td>
                    <td><button class='btn btn-danger' ng-click="eliminaCatalogo('proveedor', prov, $index)">Eliminar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop

@section('afterScripts')

@stop