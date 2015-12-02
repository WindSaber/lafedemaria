<table class='table'>
    <thead>
        <tr>
            @if(in_array('username',$display))<th><input type="text" ng-model="buscar.username" class="form-control" placeholder="Username"/></th>@endif
            @if(in_array('nombre',$display))<th><input type="text" ng-model="buscar.nombre" class="form-control" placeholder="Nombre"/></th>@endif
            @if(in_array('apellidoPaterno',$display))<th><input type="text" ng-model="buscar.apellido_paterno" class="form-control" placeholder="Apellido Paterno"/></th>@endif
            @if(in_array('apellidoMaterno',$display))<th><input type="text" ng-model="buscar.apellido_materno" class="form-control" placeholder="Apellido Materno"/></th>@endif
            @if(in_array('ubicacion',$display))<th><input type="text" ng-model="buscar.ubicacion" class="form-control" placeholder="Ubicaci&oacute;n"/></th>@endif
            @if(in_array('invImpresa',$display))<th><input type="text" ng-model="buscar.invitacion_impresa" class="form-control" placeholder="I. Impr."/></th>@endif
            @if(in_array('invEntregada',$display))<th><input type="text" ng-model="buscar.invitacion_entregada" class="form-control" placeholder="I. Entr."/></th>@endif
            @if(in_array('invAceptada',$display))<th><input type="text" ng-model="buscar.invitacion_aceptada" class="form-control" placeholder="I. Acep."/></th>@endif
            @if(in_array('observaciones',$display))<th><input type="text" ng-model="buscar.observaciones" class="form-control" placeholder="Obs."/></th>@endif
            @if(in_array('acciones',$display))<th></th>@endif
            @if(in_array('invitaciones',$display))<th colspan="3"></th>@endif
        </tr>
    </thead>
    <thead>
        <tr>
            @if(in_array('username',$display))<th ng-click="sort('username')">
                <a href=''>
                    Username
                    <span class="glyphicon sort-icon" ng-show="sortKey == 'username'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </a></th>
            @endif
            @if(in_array('nombre',$display))<th ng-click="sort('datos_personales.nombre')">
                <a href=''>
                    Nombre
                    <span class="glyphicon sort-icon" ng-show="sortKey == 'datos_personales.nombre'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </a></th>
            @endif
            @if(in_array('apellidoPaterno',$display))<th ng-click="sort('datos_personales.apellido_paterno')">
                <a href=''>
                    Apellido Paterno
                    <span class="glyphicon sort-icon" ng-show="sortKey == 'datos_personales.apellido_paterno'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </a></th>
            @endif
            @if(in_array('apellidoMaterno',$display))<th ng-click="sort('datos_personales.apellido_materno')">
                <a href=''>
                    Apellido Materno
                    <span class="glyphicon sort-icon" ng-show="sortKey == 'datos_personales.apellido_materno'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </a></th>
            @endif
            @if(in_array('ubicacion',$display))<th ng-click="sort('ubicacion.nombre')">
                <a href=''>
                    Ubicaci&oacute;n
                    <span class="glyphicon sort-icon" ng-show="sortKey == 'ubicacion.nombre'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </a></th>
            @endif
            @if(in_array('invImpresa',$display))<th ng-click="sort('invitacion_impresa')">
                <a href=''>
                    I. Impr.
                    <span class="glyphicon sort-icon" ng-show="sortKey == 'invitacion_impresa'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </a></th>
            @endif
            @if(in_array('invEntregada',$display))<th ng-click="sort('invitacion_entregada')">
                <a href=''>
                    I. Entr.
                    <span class="glyphicon sort-icon" ng-show="sortKey == 'invitacion_entregada'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </a></th>
            @endif
            @if(in_array('invAceptada',$display))<th ng-click="sort('invitacion_aceptada')">
                <a href=''>
                    I. Acep.
                    <span class="glyphicon sort-icon" ng-show="sortKey == 'invitacion_aceptada'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </a></th>
            @endif
            @if(in_array('observaciones',$display))<th ng-click="sort('observaciones')">
                <a href=''>
                    Obs.
                    <span class="glyphicon sort-icon" ng-show="sortKey == 'observaciones'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                </a></th>
            @endif
            @if(in_array('acciones',$display))<th></th>@endif
            @if(in_array('invitaciones',$display))<th colspan="3"></th>@endif
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="inv in invitados |orderBy:sortKey:reverse
            @if(in_array('username',$display))           |filter:{username:buscar.username} @endif
            @if(in_array('nombre',$display))             |filter:{datos_personales:{nombre:buscar.nombre}} @endif
            @if(in_array('apellidoPaterno',$display))    |filter:{datos_personales:{nombre:buscar.apellido_paterno}} @endif
            @if(in_array('apellidoMaterno',$display))    |filter:{datos_personales:{nombre:buscar.apellido_materno}} @endif
            @if(in_array('ubicacion',$display))          |filter:{ubicacion:{nombre:buscar.ubicacion}} @endif
            @if(in_array('invImpresa',$display))         |filter:{invitacion_impresa:buscar.invitacion_impresa} @endif   
            @if(in_array('invEntregada',$display))       |filter:{invitacion_entregada:buscar.invitacion_entregada} @endif
            @if(in_array('invAceptada',$display))        |filter:{invitacion_aceptada:buscar.invitacion_aceptada} @endif 
            @if(in_array('observaciones',$display))      |filter:{observaciones:buscar.observaciones} @endif
            @if(in_array('acciones',$display))@endif
            @if(in_array('invitaciones',$display))@endif
            ">
            @if(in_array('username',$display))<td>{{inv.username}}</td>@endif
            @if(in_array('nombre',$display))<td>{{inv.datos_personales.nombre}}</td>@endif
            @if(in_array('apellidoPaterno',$display))<td>{{inv.datos_personales.apellido_paterno}}</td>@endif
            @if(in_array('apellidoMaterno',$display))<td>{{inv.datos_personales.apellido_materno}}</td>@endif
            @if(in_array('ubicacion',$display))<td>{{inv.ubicacion.nombre}}</td>@endif
            @if(in_array('invImpresa',$display))<td>{{inv.invitacion_impresa || "No"}}</td>@endif
            @if(in_array('invEntregada',$display))<td>{{inv.invitacion_entregada || "No"}}</td>@endif
            @if(in_array('invAceptada',$display))<td>{{inv.invitacion_aceptada || "No"}}</td>@endif
            @if(in_array('observaciones',$display))<td>{{inv.observaciones}}</td>@endif
            @if(in_array('acciones',$display))
                <td><button class='btn btn-primary' ng-click="modificarInvitado(inv)">Modificar</button></td>
            @endif
            @if(in_array('invitaciones',$display))
                    <td><button class='btn btn-primary' ng-hide='inv.invitacion_impresa==="Si"'     ng-click="statusInvitacion($index,'impresa','Si')">Impresa</button></td>
                    <td><button class='btn btn-warning' ng-hide='inv.invitacion_entregada==="Si"'   ng-click="statusInvitacion($index,'entregada','Si')">Entregada</button></td>
                    <td><button class='btn btn-success' ng-hide='inv.invitacion_aceptada==="Si"'    ng-click="statusInvitacion($index,'aceptada','Si')">Aceptada</button></td>
                
            @endif
        </tr>
    </tbody>
</table>