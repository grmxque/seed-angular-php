var loginModule = angular.module('myApp.login', [])
.config(['$routeProvider', function($routeProvider) {

    $routeProvider.when('/login', {
        templateUrl: 'app/login/login.html',
        controller: loginCtrl,
        resolve : {

        }
    });

}]);

loginModule.service('loginService', loginService);