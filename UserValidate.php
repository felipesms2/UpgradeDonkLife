
<?php

include "./model-config.php";
include "./control-class-User.php";
include "./model-db-control.php";

function redir()
{
    header("location: index.php");
}


if (isset ($_GET['action'])) 
    {
        $action = $_GET['action'];
        switch ($action)
        {
            case 'checkNewUser':
                    $token = $_GET['token'];            
                    $user = new User($pdo);                    
                    $user->user_actkey = $token;
                    $user->checkActivation();
            break;

            case "resetPassword":
                echo $action;
                $user_actkey = $_GET['token'];
                break;
            
            default:
                
            break;
        }
        
        
    }
else

    {
        redir();
    }