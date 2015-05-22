'use strict';

// Declare app level module which depends on views, and components
var myApp = angular.module('myApp', [
  'ngRoute', 'restangular',
  'myApp.login', 'myApp.dashboard',
  'myApp.version'
]);

myApp.factory('authInterceptor', function ($rootScope, $q, $window, $location) {
    return {
        request: function (config) {
            config.headers = config.headers || {};

            // Si login ou logout, on reinitialise le token
            if(config.url.indexOf("/api/login") > -1 || config.url.indexOf("/api/logout") > -1){
                $window.sessionStorage.token = "";
            }

            // Pour chaque requête à l'api, on envoi le token
            if ($window.sessionStorage.token && $window.sessionStorage.token.length < 40 && config.url.indexOf("/api") > -1) {
                config.headers.Authorization = 'Bearer ' + $window.sessionStorage.token;
            }

            return config;
        },
        response: function (response) {
            if (response.status === 401) {
                $location.path('/login');
            }
            return response || $q.when(response);
        }
    };
});

myApp.config(['$routeProvider', '$httpProvider', 'RestangularProvider', function($routeProvider, $httpProvider, RestangularProvider) {
    $routeProvider.otherwise({redirectTo: '/login'});
    $httpProvider.interceptors.push('authInterceptor');

    var baseUrl = window.location.protocol + '//' + window.location.host + window.location.pathname + '/api';
    RestangularProvider.setBaseUrl(baseUrl);
}]);