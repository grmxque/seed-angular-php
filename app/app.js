'use strict';

// Declare app level module which depends on views, and components
var myApp = angular.module('myApp', [
  'ngRoute', 'restangular',
  'myApp.login', 'myApp.dashboard',
  'myApp.version'
]);

myApp.config(['$routeProvider', 'RestangularProvider', function($routeProvider, RestangularProvider) {
    $routeProvider.otherwise({redirectTo: '/login'});

    var baseUrl = window.location.protocol + '//' + window.location.host + window.location.pathname + '/api';
    RestangularProvider.setBaseUrl(baseUrl);
}]);