<?php
namespace twitter;

/**
 * Class User
 * @author Ahmad Foroughi
 * @version 1.0
 */
class User
{
    //Fields
    private $userName;
    private $password;
    private $email;
    private $lastTweetDate;
    private $image;



    /**
     * User constructor.
     * @param $userName
     * @param $password
     * @param $email
     * @param $lastTweetDate
     * @param $image
     */
    public function __construct($userName, $password, $email, $lastTweetDate, $image)
    {
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
        $this->lastTweetDate = $lastTweetDate;
        $this->image = $image;
    }


    /**
     * @return mixed
     */
    public function getUserName()
    {

        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLastTweetDate()
    {
        return $this->lastTweetDate;
    }

    /**
     * @param mixed $lastTweetDate
     */
    public function setLastTweetDate($lastTweetDate)
    {
        $this->lastTweetDate = $lastTweetDate;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }



    
}