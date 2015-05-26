function loginCtrl($scope, $location, $window, loginService){
    $scope.user = {
        username : "" ,
        pwd : ""
    }
    $scope.loading = false;
    $scope.authError = "";

    $scope.signIn = function(){
        var credentials = loginService.initiate($scope.user);
        $scope.loading = true;
        credentials.then(function(token){
            $window.sessionStorage.token = token;
            $location.path('/dashboard');
        }, function(response) {
            $scope.loading = false;
            $scope.authError = "Authentication failed, check your credentials";
            console.log("Authentication failed: ", response.status, "-", response.statusText);
        });
    }
}