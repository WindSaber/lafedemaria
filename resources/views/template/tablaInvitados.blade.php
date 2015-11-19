<table class='table'>
    <thead>
        <tr>
            @if(in_array('nombre',$display))<th>Nombre</th>@endif
            @if(in_array('apellidoPaterno',$display))<th>Apellido Paterno</th>@endif
            @if(in_array('apellidoMaterno',$display))<th>Apellido Materno</th>@endif
            @if(in_array('ubicacion',$display))<th>Ubicaci&oacute;n</th>@endif
            @if(in_array('invImpresa',$display))<th>I. Impr.</th>@endif
            @if(in_array('invEntregada',$display))<th>I. Entr.</th>@endif
            @if(in_array('invAceptada',$display))<th>I. Acep.</th>@endif
            @if(in_array('observaciones',$display))<th>Obs.</th>@endif
            @if(in_array('acciones',$display))<th></th>@endif
            @if(in_array('invitaciones',$display))<th colspan="3"></th>@endif
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="inv in invitados">
            @if(in_array('nombre',$display))<td>{{inv.datos_personales.nombre}}</td>@endif
            @if(in_array('apellidoPaterno',$display))<td>{{inv.datos_personales.apellido_paterno}}</td>@endif
            @if(in_array('apellidoMaterno',$display))<td>{{inv.datos_personales.apellido_materno}}</td>@endif
            @if(in_array('ubicacion',$display))<td>{{inv.ubicacion.nombre}}</td>@endif
            @if(in_array('invImpresa',$display))<td>{{inv.invitacion_impresa || "No"}}</td>@endif
            @if(in_array('invEntregada',$display))<td>{{inv.invitacion_entregada || "No"}}</td>@endif
            @if(in_array('invAceptada',$display))<td>{{inv.invitacion_aceptada || "No"}}</td>@endif
            @if(in_array('observaciones',$display))<td>{{inv.observaciones}}</td>@endif
            @if(in_array('invitaciones',$display))
                    <td><button class='btn btn-primary' ng-hide='inv.invitacion_impresa==="SI"'     ng-click="statusInvitacion($index,'impresa','SI')">Impresa</button></td>
                    <td><button class='btn btn-warning' ng-hide='inv.invitacion_entregada==="SI"'   ng-click="statusInvitacion($index,'entregada','SI')">Entregada</button></td>
                    <td><button class='btn btn-success' ng-hide='inv.invitacion_aceptada==="SI"'    ng-click="statusInvitacion($index,'aceptada','SI')">Aceptada</button></td>
                
            @endif
        </tr>
    </tbody>
</table>