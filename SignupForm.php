<?php

namespace twitter;


class SignupForm
{

    //Fields
    private $userName;
    private $password;
    private $email;
    private $image;

    //Error fields
    private $userNameErr;
    private $passwordErr;
    private $emailErr;
    private $imageErr;

    //Check Validation
    private $valid;

    /**
     * SignupForm constructor.
     * @param $userName
     * @param $password
     * @param $email
     * @param $image
     */
    public function __construct($userName, $password, $email, $image)
    {
        $this->userNameErr = "";
        $this->emailErr = "";
        $this->passwordErr = "";
        $this->imageErr = "";
        $this->valid = true;
        $this->setUserName($userName);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setImage($image);
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
    public function setUserName($userName): void
    {
        if(empty($userName))
        {
            $this->userNameErr = "username is required";
            $this->valid = false;
        }
        else
        {
            $userName = self::fixInput($userName);
            if(!preg_match("/^[a-z0-9_-]{3,16}$/",$userName))
            {
                $this->userNameErr = "Wrong format for username";
                $this->valid = false;
            }
            else
            {
                $this->userName = $userName;
            }
        }
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
    public function setPassword($password): void
    {
        if(empty($password))
        {
            $this->passwordErr = "password required";
            $this->valid = false;
        }
        else
        {
            if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/",$password))
            {
                $this->passwordErr = "Minimum eight and maximum 10 characters, at least one uppercase letter, one lowercase letter, one number and one special character";
                $this->valid = false;
            }
            else
            {
                $cryptPassword = crypt($password,"GodOfAbraham");
                $this->password = $cryptPassword;
            }
        }
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
    public function setEmail($email): void
    {
        if(empty($email))
        {
            $this->emailErr = "Email is required";
            $this->valid = false;
        }
        else
        {
            $email = self::fixInput($email);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $this->emailErr = "Invalid email format";
                $this->valid = false;
            }
            else
            {
                $this->email = $email;
            }
        }
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
    public function setImage($image): void
    {
        //Upload Image
        //TODO:FIX THIS
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getUserNameErr()
    {
        return $this->userNameErr;
    }

    /**
     * @param mixed $userNameErr
     */
    public function setUserNameErr($userNameErr): void
    {
        $this->userNameErr = $userNameErr;
    }

    /**
     * @return mixed
     */
    public function getPasswordErr()
    {
        return $this->passwordErr;
    }

    /**
     * @param mixed $passwordErr
     */
    public function setPasswordErr($passwordErr): void
    {
        $this->passwordErr = $passwordErr;
    }

    /**
     * @return mixed
     */
    public function getEmailErr()
    {
        return $this->emailErr;
    }

    /**
     * @param mixed $emailErr
     */
    public function setEmailErr($emailErr): void
    {
        $this->emailErr = $emailErr;
    }

    /**
     * @return mixed
     */
    public function getImageErr()
    {
        return $this->imageErr;
    }

    /**
     * @param mixed $imageErr
     */
    public function setImageErr($imageErr): void
    {
        $this->imageErr = $imageErr;
    }

    /**
     * @return mixed
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * @param mixed $valid
     */
    public function setValid($valid): void
    {
        $this->valid = $valid;
    }


    private static function fixInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function setForm($userName, $password, $email, $image)
    {
        $this->valid = true;
        $this->setUserName($userName);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setImage($image);

        //Check if username or email is already taken

    }

}