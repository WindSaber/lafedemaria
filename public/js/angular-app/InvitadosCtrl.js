feDeMariaApp.controller('invitados.InvitadosCtrl', function($scope, $rootScope, $http, Upload, $timeout) {
    $scope.invitados = [];
    $scope.invitadoSelected = null;
    $scope.addOrEdit = "add";
    $scope.result = "";
    $scope.botonSaveDisabled = false;
    $scope.forceDisabled = false;
    $scope.panelRegistrarPagoVisible = false;
    $('#modalAgregarInvitado').on('shown.bs.modal', function() {
        if (typeof rutarol !== 'undefined') {
            $('#usernameM').focus();
        } else {
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
    $scope.sort = function(keyname) {
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
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
    $scope.showPanelRegistrarPago = function(invitado) {
        $scope.panelRegistrarPagoVisible = true;
        $scope.invitadoSelected = invitado;
        $scope.forceDisabled = false;
        $scope.result = "Esperando a que ingrese los datos..."
//        $scope.movimiento = {fecha:"",monto:-1};
    };
    $scope.esMovimientoValido = function() {
        var result = true;
        try {
            if ($scope.invitadoSelected === null) {
                result = false;
            }
            if ($scope.movimiento.fecha === "") {
                result = false;
            }
            if (isNaN($scope.movimiento.monto) || $scope.movimiento.monto < 0) {
                result = false;
            }
            if($scope.forceDisabled !== false){
                return false;
            }
            return result;
        } catch (error) {
            return false;
        }
    };
    $scope.registraPago = function(comprobante) {
        $scope.result = "Espere un momento por favor, cargando... "
        $scope.forceDisabled = true;
        $scope.movimiento.invitado = $scope.invitadoSelected;
        comprobante.upload = Upload.upload({
            url: 'registraPago',
            data: {comprobante: comprobante, movimiento: $scope.movimiento},
        });
        comprobante.upload.then(function(response) {
            $scope.movimiento = {};
            $scope.invitadoSelected = {};
            $scope.panelRegistrarPagoVisible = false;
            alert('Pago registrado correctamente');
        }, function(response) {
            $scope.forceDisabled = false;
            $scope.result = 'Error al hacer la carga, intente nuevamente';
        }, function(evt) {
            $scope.result = "Carga completada"
        });
    }
    $scope.cargaDatosHistoricoPagos = function(invitado){
        $scope.invitadoSelected = invitado;
        $scope.historicoPagos={};
    }
});