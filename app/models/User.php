<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/4/16
 * Time: 下午7:21
 */

class User
{
    /**
     * @var integer $id;
     */
    private $id;

    /**
     * @var string $userName
     */
    private $userName;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $token
     */
    private $token;

    /**
     * User constructor.
     * @param string $userName
     * @param string $password
     * @param string $token
     */
    public function __construct($userName, $password, $token)
    {
        $this->userName = $userName;
        $this->password = $password;
        $this->token = $token;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }




}