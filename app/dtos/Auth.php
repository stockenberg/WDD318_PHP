<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.12.18
 * Time: 15:02
 */

namespace app\dtos;


class Auth
{

    protected $username;
    protected $password;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function getPasswordHash()
    {
        return password_hash($this->password, PASSWORD_DEFAULT, ['cost' => 12]);
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }



}