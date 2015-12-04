<!-- Modal -->
<div class="modal fade" id="modalAgregarInvitado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{addOrEditTitle}} Invitado</h4>
            </div>
            <div class="modal-body">
                <table class='table'>
                    <tr>
                        <td>Nombre</td>
                        <td><input class='form-control' id='nombreM' ng-model='invitado.datos_personales.nombre'/></td>
                    </tr>
                    <tr>
                        <td>Apellido paterno</td>
                        <td><input class='form-control' ng-model='invitado.datos_personales.apellido_paterno'/></td>
                    </tr>
                    <tr>
                        <td>Apellido materno</td>
                        <td><input class='form-control' ng-model='invitado.datos_personales.apellido_materno'/></td>
                    </tr>
                    <tr>
                        <td>Ubicaci&oacute;n</td>
                        <td>
                            <select class='form-control' ng-model='invitado.ubicacion_id'
                                    ng-options="ubicacion.id as ubicacion.nombre for ubicacion in ubicacions" >
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Forma de pago</td>
                        <td>
                            <select class='form-control' ng-model='invitado.forma_pago_id'
                                    ng-options="forma.id as forma.nombre for forma in formaPagos" >
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Referencia</td>
                        <td><textarea class='form-control' ng-model='invitado.referencia'></textarea></td>
                    </tr>
                    <tr>
                        <td>Observaciones</td>
                        <td><textarea class='form-control' ng-model='invitado.observaciones'></textarea></td>
                    </tr>
                </table>
            </div>
<!--            <pre>{{invitado}}</pre>-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" 
                        ng-disabled="!invitado.datos_personales.nombre || !invitado.datos_personales.apellido_paterno"
                        ng-click="save()"
                        >Guardar</button>
            </div>
        </div>
    </div>
</div>