<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 18.12.18
 * Time: 14:52
 */

namespace app\models;

use app\dtos\Users;
use app\traits\Database;

class User
{

    use Database;

    public function save(\app\dtos\Users $user) : bool
    {
        $sql = 'INSERT INTO users 
                (firstname, lastname, email, created_at) 
                VALUES 
                (:firstname, :lastname, :email, :created_at)';

        $db = $this->connect();

        $stmt = $db->prepare($sql);
        return $stmt->execute([
           ':firstname' => $user->getFirstname(),
           ':lastname' => $user->getLastname(),
           ':email' => $user->getEmail(),
           ':created_at' => date('Y-m-d H:i:s', time())
        ]);
    }

    public function getAllUsers() : array  {
        $sql = 'SELECT * FROM users';

        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(\PDO::FETCH_CLASS, Users::class);
        return $data;
    }
}

?>




















