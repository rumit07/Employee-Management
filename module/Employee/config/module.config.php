<?php
return [
    'service_manager' => [
        'factories' => [
            \Employee\V1\Rest\Employee\EmployeeResource::class => \Employee\V1\Rest\Employee\EmployeeResourceFactory::class,
            \Employee\V1\Rest\Department\DepartmentResource::class => \Employee\V1\Rest\Department\DepartmentResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'employee.rest.employee' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/employee[/:employee_id]',
                    'defaults' => [
                        'controller' => 'Employee\\V1\\Rest\\Employee\\Controller',
                    ],
                ],
            ],
            'employee.rest.department' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/department[/:department_id]',
                    'defaults' => [
                        'controller' => 'Employee\\V1\\Rest\\Department\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'employee.rest.employee',
            1 => 'employee.rest.department',
        ],
    ],
    'zf-rest' => [
        'Employee\\V1\\Rest\\Employee\\Controller' => [
            'listener' => \Employee\V1\Rest\Employee\EmployeeResource::class,
            'route_name' => 'employee.rest.employee',
            'route_identifier_name' => 'employee_id',
            'collection_name' => 'employee',
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
            'collection_query_whitelist' => [
                0 => 'dept_id',
                1 => 'dept_details',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Employee\V1\Rest\Employee\EmployeeEntity::class,
            'collection_class' => \Employee\V1\Rest\Employee\EmployeeCollection::class,
            'service_name' => 'Employee',
        ],
        'Employee\\V1\\Rest\\Department\\Controller' => [
            'listener' => \Employee\V1\Rest\Department\DepartmentResource::class,
            'route_name' => 'employee.rest.department',
            'route_identifier_name' => 'department_id',
            'collection_name' => 'department',
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
            'entity_class' => \Employee\V1\Rest\Department\DepartmentEntity::class,
            'collection_class' => \Employee\V1\Rest\Department\DepartmentCollection::class,
            'service_name' => 'Department',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Employee\\V1\\Rest\\Employee\\Controller' => 'Json',
            'Employee\\V1\\Rest\\Department\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'Employee\\V1\\Rest\\Employee\\Controller' => [
                0 => 'application/vnd.employee.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Employee\\V1\\Rest\\Department\\Controller' => [
                0 => 'application/vnd.employee.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Employee\\V1\\Rest\\Employee\\Controller' => [
                0 => 'application/vnd.employee.v1+json',
                1 => 'application/json',
            ],
            'Employee\\V1\\Rest\\Department\\Controller' => [
                0 => 'application/vnd.employee.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Employee\V1\Rest\Employee\EmployeeEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'employee.rest.employee',
                'route_identifier_name' => 'employee_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Employee\V1\Rest\Employee\EmployeeCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'employee.rest.employee',
                'route_identifier_name' => 'employee_id',
                'is_collection' => true,
            ],
            \Employee\V1\Rest\Department\DepartmentEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'employee.rest.department',
                'route_identifier_name' => 'department_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Employee\V1\Rest\Department\DepartmentCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'employee.rest.department',
                'route_identifier_name' => 'department_id',
                'is_collection' => true,
            ],
        ],
    ],
];
