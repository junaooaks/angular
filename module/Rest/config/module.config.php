<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'categoria'=>'Rest\Controller\CategoriaController',
            'produto' => 'Rest\Controller\ProdutoController'
        )
    ),
    'router' => array(
        'routes' => array(
            'rest'=>array(
                'type'=>'Segment',
                'options'=>array(
                    'route'=>'/api/:controller[/:id[/]]',
                    'constraints'=>array(
                        'controller'=>'[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'        =>'[a-zA-Z0-9_-]*'
                    )
                )
            )
        )
    ),
    'view-manager' => array(
        'strategies'=>array(
            'ViewJsonStrategy'
        )
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
    ),
);
