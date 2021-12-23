<?php




class System
{
    public $defaultStartForm;
    public function setForm()
    {
        switch ($this->defaultStartForm) 
        {
            case 'resetAuth':
                include "./view-form-reset-auth.php";
                break;
            case 'login':
                include "./view-form-login.php";
                break;
            
            default:
                include "./view-form-register.php";
                break;
        }
    }
}