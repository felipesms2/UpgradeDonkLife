<?php




class System
{
    public $defaultStartForm;
    public $addiTionalFooter;
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
    public function setAdditional()
    {
        if ($this->defaultStartForm !="login") 
        {
            $this->addiTionalFooter = "register";
        }
        else
        {
            $this->addiTionalFooter = "login";
        }

        return $this->addiTionalFooter;
    }

    public function jsonDisplayDOM($urlFile)
    {
        return file_get_contents($urlFile);
    }
    
}