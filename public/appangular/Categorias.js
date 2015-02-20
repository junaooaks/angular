var categorias = angular.module('Categorias', ['ngRoute', 'ngResource']);

categorias.config([
            '$routeProvider',
            function($routeProvider){
                $routeProvider
                        .when('/categorias/',{
                            templateUrl:'appangular/templates/categorias.html'
                        })
                        .when('/categorias/novo/',{
                            templateUrl:'appangular/templates/categorias_novo.html'
                        })
                        .when('/categorias/editar/:id',{
                            templateUrl:'appangular/templates/categorias_editar.html'
                        })
            }]
        );