function loginCtrl($scope, $location, loginService){
    $scope.user = {
        username : "" ,
        pwd : ""
    }

    $scope.submit = function() {

        var credentials = loginService.initiate($scope.user);
        console.log("Connexion succesfull");
    }
}