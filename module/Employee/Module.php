<?php
namespace Employee;

use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Employee\V1\Rest\Employee\EmployeeMapper' =>  function ($sm) {
                $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                return new \Employee\V1\Rest\Employee\EmployeeMapper($adapter);
                },
                'Employee\V1\Rest\Department\DepartmentMapper' =>  function ($sm) {
                $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                return new \Employee\V1\Rest\Department\DepartmentMapper($adapter);
                },
                ),
                );
    }
}
