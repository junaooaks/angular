'use strict'

angular.module('myApp', ['ngRoute','myApp.controllers'])
        .config(
            ['$routeProvider',
            function($routeProvider){
                $routeProvider
                        .when('/categorias/',{
                            templateUrl:'appangular/templates/categorias.html',
                            controller: 'CategoriasCtrl'
                        })
                        .when('/categorias/novo/',{
                            templateUrl:'appangular/templates/categorias_novo.html',
                            controller: 'CategoriasCtrl'
                        })
                        .when('/categorias/editar/:id',{
                            templateUrl:'appangular/templates/categorias_editar.html',
                            controller: 'CategoriasCtrl'
                        })
                        .when('/produtos/',{
                            templateUrl:'appangular/templates/produtos.html',
                            controller: 'ProdutosCtrl'
                        })
                        .when('/produtos/novo/',{
                            templateUrl:'appangular/templates/produtos_novo.html',
                            controller: 'ProdutosCtrl'
                        })
                        .when('/produtos/editar/:id',{
                            templateUrl:'appangular/templates/produtos_editar.html',
                            controller: 'ProdutosCtrl'
                        })
            }]
        );