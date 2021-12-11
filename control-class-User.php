
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

        private function __construct($dbObj)
            {
                $this->pdoConn = $dbObj;
            }
        
        public function userAvailability()
        {
            
        }
    }
