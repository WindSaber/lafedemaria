feDeMariaApp.controller('catalogos.CatalogosCtrl', function($scope, $rootScope, $http) {
    $scope.servicios = [];
    $scope.addOrEdit = "add";
    $scope.botonSaveDisabled = false;
    $rootScope.instrucciones = "Espere mientras se carga la informacion";
    $scope.recargaCatalogos = function(tipoCatalogo) {
        var url = eval('ruta'+tipoCatalogo+";");
        $http.get(url).then(function(response) {
            console.log(response.data);
            eval("$scope."+tipoCatalogo+"s = response.data;");
            $rootScope.instrucciones = "Llena el formulario de la izquierda con datos y presiona guardar o da click en algun registro de la tabla de la derecha para editar";
        }, function(response) {
            console.log('Error');
        });
    }
    $scope.nuevoCatalogo = function(tipoCatalogo) {
        $rootScope.instrucciones = "Llene el formulario con informacion deseada";
        eval("$scope."+tipoCatalogo+" = {};");
        $scope.addOrEdit = "add";
        $("#nombre").focus();
    }
    $scope.saveCatalogo = function(tipoCatalogo){
        if($scope.addOrEdit === 'add'){
            $scope.crearCatalogo(tipoCatalogo);
        }else{
            $scope.updateCatalogo(tipoCatalogo);
        }
    }
    $scope.crearCatalogo = function(tipoCatalogo){
        $rootScope.instrucciones = "Espere mientras se procesa la informacion";
        var url = eval('ruta'+tipoCatalogo);
        var post = eval('$scope.'+tipoCatalogo);
        $http.post(url, post).then(function(response) {
            eval('$scope.'+tipoCatalogo+'s.push(response.data);');
            $scope.recargaCatalogos(tipoCatalogo);
            $rootScope.instrucciones = "informacion almacenada";
        }, function(response) {
            console.log('Error');
        });
    };
    $scope.updateCatalogo = function(tipoCatalogo){
        $rootScope.instrucciones = "Espere mientras se procesa la informacion";
        $scope.botonSaveDisabled = true;
        var url = eval('ruta'+tipoCatalogo+";");
        var post = eval('$scope.'+tipoCatalogo+";");
        $http.put(url, post).then(function(response) {
            $scope.botonSaveDisabled = false;
            $rootScope.instrucciones = "Informacion almacenada";
        }, function(response) {
            console.log('Error');
        });
    };
    $scope.editaCatalogo = function(tipoCatalogo, catalogo, campoFocus){
        $scope.addOrEdit = "edit";
        eval("$scope."+tipoCatalogo+" = catalogo;");
        $("#"+campoFocus).focus();
    };
    $scope.eliminaCatalogo = function(tipoCatalogo, catalogo, index){
        $rootScope.instrucciones = "Espere mientras se procesa la informacion";
        var url = eval('ruta'+tipoCatalogo+"+'/'+catalogo.id;");
        $http.delete(url).then(function(response) {
            eval("$scope."+tipoCatalogo+"s.splice(index, 1)");
            $rootScope.instrucciones = "Registro eliminado";
        }, function(response) {
            console.log('Error');
        });
    }
});

