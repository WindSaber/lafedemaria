feDeMariaApp.controller('invitados.InvitadosCtrl', function($scope, $rootScope, $http) {
    $scope.invitados = [];
    $scope.addOrEdit = "add";
    $scope.botonSaveDisabled = false;
    $('#modalAgregarInvitado').on('shown.bs.modal', function() {
        if (typeof rutarol !== 'undefined') {
            $('#usernameM').focus();
        }else{
            $('#nombreM').focus();
        }
    });
    $scope.recargaInvitados = function() {
        $http.get(rutaInvitado + "s").then(function(response) {
            console.log(response.data);
            $scope.invitados = response.data;
        }, function(response) {
            console.log('Error');
        });
    }
    function cargaCatalogosModal() {
        cargaCatalogo('ubicacion');
        if (typeof rutarol !== 'undefined') {
            cargaCatalogo('rol');
        }
        if (typeof rutaformaPago !== 'undefined') {
            cargaCatalogo('formaPago');
        }
    }
    $scope.nuevoInvitado = function() {
        console.log('En nuevo invitado');
        cargaCatalogosModal();
        $scope.invitado = {};
        $scope.addOrEdit = "add";
        $scope.addOrEditTitle = "Agregar";
        $("#nombre").focus();
    }
    $scope.modificarInvitado = function(invitado) {
        console.log('En Modificar invitado');
        cargaCatalogosModal();
        $scope.invitado = invitado;
        $scope.addOrEdit = "edit";
        $scope.addOrEditTitle = "Editar";
        $("#nombre").focus();
    }
    $scope.save = function() {
        if ($scope.addOrEdit === 'add') {
            $scope.crearInvitado();
        } else {
            $scope.crearInvitado();
        }
        

    }
    $scope.crearInvitado = function() {
        var url = rutaInvitado;
        var post = $scope.invitado;
        post.addOrEdit = $scope.addOrEdit;
        $http.post(url, post).then(function(response) {
            console.log(response);
            $scope.invitados.push(response.data);
            $scope.recargaInvitados();
            $('#modalAgregarInvitado').modal('toggle');
        }, function(response) {
            console.log('Error');
        });
    };
    $scope.statusInvitacion = function(index, invitacion, status) {
        var url = rutaInvitado + "/invitacion";
        eval("$scope.invitados[index].invitacion_" + invitacion + "=status;");
        var post = $scope.invitados[index];
        console.log(post);
        $http.post(url, post).then(function(response) {
        }, function(response) {
            console.log('Error');
        });
    }
    function seteaSelectsNew(tipoCatalogo) {
        if ($scope.addOrEdit === "add") {
            switch (tipoCatalogo) {
                case 'ubicacion':
                    if (typeof rutarol !== 'undefined') {
                        $scope.invitado.ubicacion_responsable = $scope.ubicacions[0].id;
                    } else {
                        $scope.invitado.ubicacion_id = $scope.ubicacions[0].id;
                    }
                    break;
                case 'formaPago':
                    $scope.invitado.forma_pago_id = $scope.formaPagos[0].id;
                    break;
            }
        }
    }
    ;
    function cargaCatalogo(tipoCatalogo) {
        var url = eval('ruta' + tipoCatalogo + ";");
        $http.get(url).then(function(response) {
            console.log(response.data);
            eval("$scope." + tipoCatalogo + "s = response.data;");
            seteaSelectsNew(tipoCatalogo);
        }, function(response) {
            console.log('Error');
        });
    }

});