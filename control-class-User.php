
<?php

class User
    
    {
        public $pdoConn;
        public $name;
        public $email;
        public $userName;
        public $password;
        public $passwordConfirm;
        public $checkRegister;
        public $userFound = [];

        public function validateEmail($email)
        {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public function __construct($dbObj)
        {
            $this->pdoConn = $dbObj;
        }
        
        public function userAvailability()
        {
            $this->userFound["userName"] = 0;
            $this->userFound["email"] = 0;

            $sqlGetUser = "SELECT * FROM phpbb_users WHERE username ='" . $this->userName . "'";
            $sqlGetEmail = "SELECT * FROM phpbb_users WHERE user_email ='" . $this->email . "'";

            $result = $this->pdoConn->query($sqlGetUser);
            $rowCountUser = $result->rowCount();
            if ($rowCountUser >0) 
                {
                    $this->userFound['userName'] = 1;
                }
             $result = $this->pdoConn->query($sqlGetEmail);
             $rowCountEmail = $result->rowCount();
             if ($rowCountEmail >0) 
                {
                    $this->userFound['email'] = 1;
                }
            return $this->userFound;
        }

        public function userRegister()
        {
            
        }


    }
