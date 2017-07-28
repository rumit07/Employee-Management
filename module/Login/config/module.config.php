<?php
return [
    'service_manager' => [
        'factories' => [
            \Login\V1\Rest\Login\LoginResource::class => \Login\V1\Rest\Login\LoginResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'login.rest.login' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/login[/:login_id]',
                    'defaults' => [
                        'controller' => 'Login\\V1\\Rest\\Login\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'login.rest.login',
        ],
    ],
    'zf-rest' => [
        'Login\\V1\\Rest\\Login\\Controller' => [
            'listener' => \Login\V1\Rest\Login\LoginResource::class,
            'route_name' => 'login.rest.login',
            'route_identifier_name' => 'login_id',
            'collection_name' => 'login',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'PATCH',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Login\V1\Rest\Login\LoginEntity::class,
            'collection_class' => \Login\V1\Rest\Login\LoginCollection::class,
            'service_name' => 'Login',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Login\\V1\\Rest\\Login\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Login\\V1\\Rest\\Login\\Controller' => [
                0 => 'application/vnd.login.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Login\\V1\\Rest\\Login\\Controller' => [
                0 => 'application/vnd.login.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Login\V1\Rest\Login\LoginEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'login.rest.login',
                'route_identifier_name' => 'login_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Login\V1\Rest\Login\LoginCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'login.rest.login',
                'route_identifier_name' => 'login_id',
                'is_collection' => true,
            ],
        ],
    ],
];
