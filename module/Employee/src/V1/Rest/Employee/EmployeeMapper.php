<?php
namespace Employee\V1\Rest\Employee;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Db\TableGateway\TableGateway;

class EmployeeMapper
{

    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAllEmployee()
    {
        try {
            $select = new Select();
            $select->from('employee')->join('department', 'employee.dept_id = department.dept_id', array());
            $paginatorAdapter = new DbSelect($select, $this->adapter);
            $collection = new EmployeeCollection($paginatorAdapter);
            return $collection;
        } catch (\Exception $e) {
            throw new \Exception();
        }
    }

    public function getEmployeeByDept($id)
    {
        try {
            $select = new Select();
            $select->from('employee')
                ->join('department', 'employee.dept_id = department.dept_id', array())
                ->where(array(
                'department.dept_id' => $id
            ));
            
            $paginatorAdapter = new DbSelect($select, $this->adapter);
            $collection = new EmployeeCollection($paginatorAdapter);
            return $collection;
        } catch (\Exception $e) {
            throw new \Exception();
        }
    }

    public function getEmployee($id)
    {
        try {
            $sql = 'SELECT * FROM employee,department WHERE employee_id = ?';
            $resultset = $this->adapter->query($sql, array(
                $id
            ));
            $data = $resultset->toArray();
            if (! $data) {
                return false;
            }
            
            return $data;
        } catch (\Exception $e) {
            throw new \Exception();
        }
    }

    public function insert($data)
    {
        try {
            $table = new TableGateway('employee', $this->adapter);
            
            $obj = new EmployeeEntity();
            $new = $obj->getArrayCopy($data);
            
            $result = $table->insert($new);
            if ($result) {
                return true;
            } else
                return false;
        } catch (\Exception $e) {
            throw new \Exception();
        }
    }

    public function delete($id)
    {
        try {
            $table = new TableGateway('employee', $this->adapter);
            $result = $table->delete(array(
                'employee_id' => $id
            ));
            if ($result) {
                return true;
            } else
                return false;
        } catch (\Exception $e) {
            throw new \Exception();
        }
    }

    public function update($id, $data)
    {
        try {
            $table = new TableGateway('employee', $this->adapter);
            $obj = new EmployeeEntity();
            
            $new = $obj->getArrayCopy($data);
            $res = $table->update($new, array(
                'employee_id' => $id
            ));
            if ($res) {
                return true;
            } else
                return false;
        } catch (\Exception $e) {
            throw new \Exception();
        }
    }
}