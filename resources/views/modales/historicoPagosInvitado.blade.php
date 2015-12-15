<!-- Modal -->
<div class="modal fade" id="modalHistoricoPagosInvitado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Invitado: <span class="badge">{{invitadoSelected.datos_personales.nombre + invitadoSelected.datos_personales.apellido_paterno + invitadoSelected.datos_personales.apellido_materno}}</span></h4>
            </div>
            <div class="modal-body">
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Observaciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="r in historicoPagos | orderBy: fecha">
                            <td>{{r.fecha}}</td>
                            <td>{{r.monto}}</td>
                            <td>{{r.observaciones}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>
