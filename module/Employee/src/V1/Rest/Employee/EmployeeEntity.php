<?php
namespace Employee\V1\Rest\Employee;

class EmployeeEntity
{
    
    
    
    public $dept_id;
    public $employee_id;
    public $username;
    public $first_name;
    public $last_name;
    public $DOJ;
    public $DOB;
    public $image;
    public $designation;
    public $password;
    
    
     
    
    
    
    
    
    
    public function getArrayCopy($data)
    {
    
        return array(
             'dept_id'     => $data->dept_id,
            
            'username'     => $data->username,
            'first_name'     => $data->first_name,
            'last_name'     => $data->last_name,
            'DOJ'     => $data->DOJ,
            'DOB'     => $data->DOB,
            'image'     => $data->image,
            'designation'     => $data->designation,
            
            'password' => $data->password,
        );
    }
    
    public function exchangeArray(array $array)
    {
        
    }
}
