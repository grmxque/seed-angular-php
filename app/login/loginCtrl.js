'use strict';

var app = angular.module('myApp.login', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/login', {
        templateUrl: 'app/login/login.html',
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
}]);