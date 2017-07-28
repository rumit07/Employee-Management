<?php
namespace Employee\V1\Rest\Department;

class DepartmentResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Employee\V1\Rest\Department\DepartmentMapper');
       // return new AlbumResource($mapper);
        return new DepartmentResource($mapper);
    }
}
