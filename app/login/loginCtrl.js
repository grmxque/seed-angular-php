'use strict';

var app = angular.module('myApp.login', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/login', {
        templateUrl: 'login/login.html',
        controller: 'loginCtrl'
    });

    $routeProvider.when('/welcome', {
        templateUrl: 'login/welcome.html',
        controller: 'loginCtrl'
    });
}]);

app.controller('loginCtrl',['$scope', '$location', function($scope,$location) {
    $scope.user = {
        username : "" ,
        pwd : ""
    }

    $scope.submit = function() {
        $location.path('/dashboard');
        console.log("Connexion succesfull");
    }

    $scope.cancel = function() {
        $scope.user = {
            username : "" ,
            pwd : ""
        }
    }
}]);