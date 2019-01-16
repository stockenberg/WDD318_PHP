<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 16.01.19
 * Time: 14:28
 */

namespace app\models;


use app\dtos\Roles;
use app\traits\Database;

class Role
{

    use Database;

    public function getAll()
    {

        $sql = 'SELECT id, value FROM roles';
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Roles::class);
    }

    public function buildConstants()
    {
        $data = $this->getAll();
        /**
         * @var Roles $role
         */
        foreach ($data as $role){
            define(strtoupper($role->getValue()), $role->getId());
        }

        
    }


}