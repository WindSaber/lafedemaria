<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="[[route('inicio')]]">Inicio</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Invitados <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!--<li><a href="#">Listado general</a></li>-->
                        @if(Auth::check() && in_array(Auth::user()->rol->nombre, array("root","administrador","consulta")))<li><a href="[[route('invitaciones')]]">Registro de invitaciones</a></li>@endif
                        @if(Auth::check() && in_array(Auth::user()->rol->nombre, array("root","administrador")))<li><a href="[[route('registrarPago')]]">Registro de pago</a></li>@endif
<!--                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Reporte general</a></li>
                        <li><a href="#">Reporte falta imprimir invitaci&oacute;n</a></li>
                        <li><a href="#">Reporte invitacion impresa</a></li>
                        <li><a href="#">Reporte falta entregar invitacion</a></li>
                        <li><a href="#">Reporte invitacion entregada</a></li>
                        <li><a href="#">Reporte SI acepto invitacion</a></li>
                        <li><a href="#">Reporte NO acepto invitacion</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>-->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Movimientos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Entradas</a></li>
                        <li><a href="#">Salidas</a></li>
                    </ul>
                </li>
                <li><a href="#">Integrantes</a></li>
                <li><a href="#">Proveedores</a></li>
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cat&aacute;logos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(in_array(Auth::user()->rol->nombre, array("root")))<li><a href="[[route('integrantesPrincipal')]]">Integrantes</a></li>@endif
                        @if(in_array(Auth::user()->rol->nombre, array("root","administrador")))
                            <li><a href="[[route('invitadosPrincipal')]]">Invitados</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="[[route('proveedores')]]">Proveedores</a></li>
                            <li><a href="[[route('roles')]]">Roles</a></li>
                            <li><a href="[[route('ubicaciones')]]">Ubicaciones</a></li>
                            <li><a href="[[route('formasPago')]]">Formas de pago</a></li>
                            <li><a href="[[route('servicios')]]">Servicios</a></li>
                        @endif
                        <!--<li><a href="#">Cotizaciones</a></li>-->
                    </ul>
                </li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li><a href="#">Bienvenido: [[Auth::user()->datos_personales->nombre]]</a></li>
                <li><a href="[[route('logout')]]">Cerrar sesi&oacute;n</a></li>
                @else
                <li><a href="#" data-toggle="modal" data-target="#modalIniciarSesion" >Iniciar sesi&oacute;n</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>