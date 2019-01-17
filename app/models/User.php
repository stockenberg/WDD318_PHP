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

    public static $inputFields = [
        'username' => ['type' => 'text', 'label' => 'Benutzername'],
        'firstname' => ['type' => 'text', 'label' => 'Vorname'],
        'lastname' => ['type' => 'text', 'label' => 'Nachname'],
        'email' => ['type' => 'email', 'label' => 'E-Mail-Adresse'],
        'password' => ['type' => 'password', 'label' => 'Passwort'],
        'password_retyped' => ['type' => 'password', 'label' => 'Passwort erneut eingeben']
    ];

    use Database;

    public function save(Users $user) : bool
    {
        $sql = 'INSERT INTO users 
                (username, firstname, lastname, email, password, created_at, role_id) 
                VALUES 
                (:username, :firstname, :lastname, :email, :password, :created_at, :role_id)';

        $db = Database::connect();

        $stmt = $db->prepare($sql);
        return $stmt->execute([
           ':username' => $user->getUsername(),
           ':firstname' => $user->getFirstname(),
           ':lastname' => $user->getLastname(),
           ':email' => $user->getEmail(),
           ':password' => $user->getPassword(),
           ':created_at' => date('Y-m-d H:i:s', time()),
           ':role_id' => $user->getRoleId()
        ]);
    }

    public function getAllUsers() : array  {
        $sql = 'SELECT * FROM users WHERE username != "root" ';

        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(\PDO::FETCH_CLASS, Users::class);
        return $data;
    }

    public function destroy(Int $id)
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}

?>




















