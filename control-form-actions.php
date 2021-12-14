<?php

    include "./model-db-control.php";
    include "./control-class-User.php";

    $postString = implode(",", $_POST);
    $action = $_POST['action'];    

    switch ($action) 
    {
        case 'registration':
            
            $error ="";
            $name = $_POST['name'];
            $email = $_POST['email'];
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
            
            $user = new User($pdo);
            $user->email = $email;
            $user->userLogin = $userName;
            $user->userAvailability();

            if ($user->validateEmail($email)==false) 
                {
                    $error .="<li>Formato de email incorreto</li>";
                }

            if ($user->userFound['userLogin']==true) 
                {
                    $error .="<li>Usuário ". $user->userLogin ." Já está registrado</li>" ;
                }
            
            if ($user->userFound['email']==true) 
                {
                    $error .="<li>Email ". $user->email ." Já está registrado</li>" ;
                }
            

            if (empty($name)) 
                {
                    $error .= "<li>Nome é obrigatório</li>";
                }

            if (empty($email)) 
                {
                    $error .= "<li>Email não foi informado</li>";
                }

            if (empty($userName)) 
                {
                    $error .= "<li>Nome de usuário</li>";
                }

            if (empty($password)) 
                {
                    $error .= "<li>Senha não pode ficar vazia</li>";
                }

            if (empty($passwordConfirm)) 
                {
                    $error .= "<li>Confirmação de senha ausente</li>";
                }
            if ($password !== $passwordConfirm) 
                {
                    $error .= "<li>Senha e confirmação de senha devem ser iguais</li>";
                }
            if (empty($error)) 
            {
                http_response_code( 200 );
                $user->register();
                echo json_encode( [ 'msg' => "ok" ] );
            }
                
            else
            {
                http_response_code( 406 );
                echo json_encode( [ 'msg' => $error ] );
            }
            
        break;
        
        default:
        
            break;
    }



    
    