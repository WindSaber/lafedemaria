<form name='myForm'>
    <table class='table'>
        <tr>
            <td colspan="2" class="danger text-center">
                Invitado: <b>{{invitadoSelected.datos_personales.nombre}}</b>
            </td>
        </tr>
        <tr>
            <td>Fecha:</td>
            <td><input class="form-control" type="text" ng-model="movimiento.fecha"/></td>
        </tr>
        <tr>
            <td>Monto:</td>
            <td><input class="form-control" type="text" ng-model="movimiento.monto"/></td>
        </tr>
        <tr>
            <td>Observaciones:</td>
            <td><textarea class="form-control" type="text" ng-model="movimiento.observaciones"></textarea></td>
        </tr>
        <tr>
            <td>Comprobante:</td>
            <td><input class="form-control" type="file" ngf-select ng-model="movimiento.comprobante" name="comprobante" accept="image/*" ngf-max-size="2MB" required/></td>
        </tr>
        <tr>
            <td colspan="2">
                <button ng-click="registraPago(movimiento.comprobante)" ng-disabled="!esMovimientoValido() || !myForm.$valid" class="btn btn-lg btn-danger" ng-click="" style="width: 100%">$50</button>
            </td>
        </tr>
        <tr>
            <td colspan="2" class='info'>
                {{result}}
            </td>
        </tr>
    </table>
</form>