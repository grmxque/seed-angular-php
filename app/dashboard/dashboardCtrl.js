'use strict';

var app = angular.module('myApp.dashboard', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/dashboard', {
        templateUrl: 'app/dashboard/dashboard.html',
        controller: 'dashboardCtrl'
    });
}]);

app.controller('dashboardCtrl',['$scope', function($scope) {

}]);