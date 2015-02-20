categorias
        .controller('CategoriasCtrl',
            ['$scope','CategoriasSrv','$location','$routeParams',
                function($scope, CategoriasSrv, $location, $routeParams){
                    //$scope.nome = 'OAKS';
                    
                    $scope.load = function(){
                        $scope.registros = CategoriasSrv.query();
                    }
                    
                    $scope.get = function(){
                        $scope.item = CategoriasSrv.get({id:$routeParams.id});
                    }
                    
                    $scope.add = function(item){
                        $scope.result = CategoriasSrv.save(
                                {},
                               item,
                                //caso tenha sucesso no inserir registro
                                function(data, status, headers, config){
                                    $location.path('/categorias/');
                                },
                                //se nao tiver sucesso
                                function(data, status, headers, config){
                                    alert('ERRO AO INSERIR REGISTRO'+data.messages[0]);
                                }
                        );
                    }
                    $scope.editar = function(item){
                        $scope.result = CategoriasSrv.update(
                                {id:$routeParams.id},
                               item,
                                //caso tenha sucesso no inserir registro
                                function(data, status, headers, config){
                                    $location.path('/categorias/');
                                },
                                //se nao tiver sucesso
                                function(data, status, headers, config){
                                    alert('ERRO AO INSERIR REGISTRO'+data.messages[0]);
                                }
                        );
                    }
                    
                    $scope.delete = function(id){
                        if(confirm('Deseja relamente excluir registro?')){
                            CategoriasSrv.remove(
                                    {id:id},
                                    {},
                                    //caso tenha sucesso no inserir registro
                                function(data, status, headers, config){
                                    $location.path('/categorias/');
                                },
                                //se nao tiver sucesso
                                function(data, status, headers, config){
                                    alert('ERRO AO INSERIR REGISTRO'+data.messages[0]);
                                }
                                    )
                        }
                        
                    }
                }
            ]
        );