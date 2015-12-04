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
                        <td>Username</td>
                        <td><input class='form-control' id="usernameM" ng-model='invitado.username'/></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input class='form-control' ng-model='invitado.datos_personales.nombre'/></td>
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
                        <td>Rol</td>
                        <td>
                            <select class='form-control' ng-model='invitado.rol_id'
                                    ng-options="rol.id as rol.nombre for rol in rols" >
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ubicaci&oacute;n resposable</td>
                        <td>
                            <select class='form-control' ng-model='invitado.ubicacion_responsable'
                                    ng-options="ubicacion.id as ubicacion.nombre for ubicacion in ubicacions" >
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Celular</td>
                        <td><input class='form-control' ng-model='invitado.celular'/></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><input class='form-control' ng-model='invitado.telefono'/></td>
                    </tr>
                    <tr>
                        <td>Facebook</td>
                        <td><input class='form-control' ng-model='invitado.facebook'/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input class='form-control' type="password" ng-model='invitado.password'/></td>
                    </tr>
                </table>
            </div>
            <!--<pre>{{invitado}}</pre>-->
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