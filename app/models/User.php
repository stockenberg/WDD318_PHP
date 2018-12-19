<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 18.12.18
 * Time: 14:52
 */

namespace app\models;

class User
{

    public function connect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=wdd318;charset=utf8',
            'homestead', 'secret');
        return $db;
    }

    public function save(\app\dtos\User $user) : bool
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
}

?>




















