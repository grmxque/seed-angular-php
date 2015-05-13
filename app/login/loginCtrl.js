'use strict';

var app = angular.module('myApp.login', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/login', {
        templateUrl: 'login/login.html',
        controller: 'loginCtrl'
    });
}]);

app.controller('loginCtrl',['$scope', function($scope) {
    $scope.user = {
        email : "" ,
        pwd : ""
    }

    $scope.submit = function() {
        // TODO: Lier au backend
        
    }

    $scope.reset = function() {
        $scope.user = {
            email : "" ,
            pwd : ""
        }
    }
}]);