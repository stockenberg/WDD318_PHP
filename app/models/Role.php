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

    public static function getAll()
    {
        $sql = 'SELECT id, value FROM roles';
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Roles::class);
    }

    public static function getRoleNameById($id)
    {
        $sql = 'SELECT value FROM roles WHERE id = :id';
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return ucfirst($stmt->fetch(\PDO::FETCH_ASSOC)['value']);
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