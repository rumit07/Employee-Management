<?php
namespace Employee\V1\Rest\Department;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Db\TableGateway\TableGateway;

class DepartmentMapper
{

    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getOneDepartment($id)
    {
        try {
            $sql = 'SELECT * FROM department WHERE dept_id = ?';
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

    public function getDepartments()
    
    {
        try {
            $select = new Select('department');
            $paginatorAdapter = new DbSelect($select, $this->adapter);
            $collection = new DepartmentCollection($paginatorAdapter);
            return $collection;
        } catch (\Exception $e) {
            throw new \Exception();
        }
    }

    public function insert($data)
    {
        try {
            $table = new TableGateway('department', $this->adapter);
            
            $obj = new DepartmentEntity();
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
            $table = new TableGateway('department', $this->adapter);
            $result = $table->delete(array(
                'dept_id' => $id
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
            $table = new TableGateway('department', $this->adapter);
            $obj = new DepartmentEntity();
            
            $new = $obj->getArrayCopy($data);
            $res = $table->update($new, array(
                'dept_id' => $id
            ));
            // print_r($res);
            if ($res) {
                return true;
            } else
                return false;
        } catch (\Exception $e) {
            throw new \Exception();
        }
    }
}
