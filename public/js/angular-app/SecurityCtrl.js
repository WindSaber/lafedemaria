feDeMariaApp.controller('SecurityCtrl',function($rootScope, $scope, $http){
    $scope.autenticar = function(){
        $http.post(baseUrl + "login", $scope.credentials).then(function(response) {
            console.log(response);
            if(response.data !== "No"){
                window.location.reload();
            }else{
                alert('El usuario o la contraseña son incorrectos, intente nuevamente');
                $('#password').select();
            }
        }, function(response) {
            console.log('Error');
        });
    };
});