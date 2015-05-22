function loginCtrl($scope, $location, $window, loginService){
    $scope.user = {
        username : "" ,
        pwd : ""
    }

    $scope.signIn = function() {
        var credentials = loginService.initiate($scope.user);

        credentials.then(function(token){
            $window.sessionStorage.token = token;
            //$location.path('/dashboard');
        }, function(response) {
            console.log("Error with status code", response.status);
        });
    }
}