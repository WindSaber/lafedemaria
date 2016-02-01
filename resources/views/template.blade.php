<!DOCTYPE>
<html>
    <head>
        <meta name="description" content="La Fe de Maria Nos Une">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <title>@yield('titulo')</title>
        {!! HTML::style('css/bootstrap/bootstrap.min.css') !!}
        {!! HTML::style('css/bootstrap/bootstrap-theme.min.css') !!}
        @yield('afterCss')
    </head>
    <body ng-app="feDeMariaApp">
        <!--JS de Angular-->
        <script>var baseUrl = '[[route("inicio")]]/';</script>
        {!! HTML::script('js/angular/angular.min.js') !!}
        {!! HTML::script('js/angular-app/app.js') !!}
        {!! HTML::script('js/angular-app/Directivas.js') !!}
        {!! HTML::script('js/angular-app/InstruccionesCtrl.js') !!}
        {!! HTML::script('js/angular-app/SecurityCtrl.js') !!}
        {!! HTML::script('js/angular-libs/ng-file-upload-shim.js') !!}
        {!! HTML::script('js/angular-libs/ng-file-upload.js') !!}
        @yield('angularScripts')

        @include('template.navbar')

        @yield('contenido')
        @include('template.footer')
        @include('modales.iniciarSesion')

        <!--Seccion de js-->
        {!! HTML::script('js/jquery/jquery-2.1.4.min.js') !!}
        {!! HTML::script('js/bootstrap/bootstrap.min.js') !!}
        {!! HTML::script('js/datepicker/bootstrap-datepicker.min.js') !!}
        {!! HTML::script('js/datepicker/locales/bootstrap-datepicker.es.min.js') !!}
        <script>
            $('#modalIniciarSesion').on('shown.bs.modal', function() {
                $('#username').focus();
            });
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                clearBtn: true,
                language: "es",
                autoclose: true,
                todayHighlight: true,
                onSelect: function(date) {
                    scope.$apply(function() {
                        ngModelCtrl.$setViewValue(date);
                    });
                }
            });

        </script>
        @yield('afterScripts')
    </body>
</html>