feDeMariaApp.controller('SecurityCtrl',function($rootScope, $scope, $http){
    $scope.autenticar = function(){
        $http.post(baseUrl + "login", $scope.credentials).then(function(response) {
            console.log(response);
        }, function(response) {
            console.log('Error');
        });
    };
});