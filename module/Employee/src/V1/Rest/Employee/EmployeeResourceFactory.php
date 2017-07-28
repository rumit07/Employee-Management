<?php
namespace Employee\V1\Rest\Employee;

class EmployeeResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Employee\V1\Rest\Employee\EmployeeMapper');
       // return new AlbumResource($mapper);
        return new EmployeeResource($mapper);
    }
}
