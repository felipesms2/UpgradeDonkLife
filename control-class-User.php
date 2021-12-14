
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

        public function validateEmail($email)
        {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        private function __construct($dbObj)
        {
            $this->pdoConn = $dbObj;
        }
        
        public function userAvailability()
        {
            
        }


    }
