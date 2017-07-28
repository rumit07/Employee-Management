<?php
namespace Employee\V1\Rest\Department;

class DepartmentEntity
{
    public $dept_id;
    public $dept_name;
   
    
    
    
    
    
    
    public function getArrayCopy($data)
    {
    
        return array(
           // 'dept_id'     => $this->id,
            'dept_name' => $data->dept_name,
        );
    }
    
    public function exchangeArray(array $array)
    {
        $this->dept_id     = $array['dept_id'];
        $this->dept_name = $array['dept_name'];
    }  
    
    
    
    
}
