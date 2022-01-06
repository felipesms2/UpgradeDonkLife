<?php




class System
{
    public $defaultStartForm;
    public $addiTionalFooter;
    public $defaultAuthForm = "register";
    public $formToHide;
    public function setForm()
    {
        switch ($this->defaultStartForm) 
        {
            
            case 'resetAuth':
                include "./view-form-reset-auth.php";
                break;
            case 'login':
                $this->formToHide = "registrationForm";
                include "./view-form-login.php";
                include "./view-form-register.php";
                break;
            case 'register':
                $this->formToHide = "formLogin";
                include "./view-form-register.php";
                include "./view-form-login.php";
            break;    
            default:
            $this->formToHide = "formLogin";
            include "./view-form-register.php";
            include "./view-form-login.php";
                break;
            $this->defaultAuthForm = $this->defaultStartForm;
        }
    }

    public function setDisplayForm($formID)
        {
            $cssDisplay = "";
            if($formID == $this->formToHide)
                {
                    $cssDisplay = "none";
                }
            return $cssDisplay;
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

    public function singleMsg($unsetRule = false)
        {
            
            $mainMsgRules = [];
            $mainMsgRules["contentMsg"] ="";
            $mainMsgRules["classDiv"] ="d-none";

            if (isset($_SESSION["mainMsg"])) 
            {
                $mainMsgRules["classDiv"] = "";
                $mainMsgRules["contentMsg"] = $_SESSION['mainMsg'];
                if($unsetRule ==true)
                    {
                        unset($_SESSION['mainMsg']);
                    }
            }
            
            return $mainMsgRules;
        }
    
}