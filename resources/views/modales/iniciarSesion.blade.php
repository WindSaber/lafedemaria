<!-- Modal -->
<div class="modal fade" id="modalIniciarSesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-controller="SecurityCtrl">
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
                        <td><input class='form-control' ng-model='credentials.username'/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input class='form-control' type="password" ng-model='credentials.password'/></td>
                    </tr>
                </table>
            </div>
            <pre>{{credentials}}</pre>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary"  ng-click="autenticar()">Guardar</button>
            </div>
        </div>
    </div>
</div>