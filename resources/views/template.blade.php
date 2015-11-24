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
        {!! HTML::script('js/angular-app/InstruccionesCtrl.js') !!}
        {!! HTML::script('js/angular-app/SecurityCtrl.js') !!}
        @yield('angularScripts')
        
        @include('template.navbar')
        
        @yield('contenido')
        @include('template.footer')
        @include('modales.iniciarSesion')
        
        <!--Seccion de js-->
        {!! HTML::script('js/jquery/jquery-2.1.4.min.js') !!}
        {!! HTML::script('js/bootstrap/bootstrap.min.js') !!}
        @yield('afterScripts')
    </body>
</html>