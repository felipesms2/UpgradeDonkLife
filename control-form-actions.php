<?php

    include "./model-db-control.php";
    include "./control-class-User.php";
    include "./model-config.php";
    
    $error ="";
    $idFieldError = [];
    $errorMsg = [];

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
            $codeArea = $_POST['codeArea'];
            
            
            $user = new User($pdo);
            $user->email = $email;
            $user->name = $name;
            $user->password = $password;
            $user->userLogin = $userName;
            $user->userAvailability();

            if (empty($codeArea)) 
            {
                $idFieldError[] = "codeArea";
                $errorMsg["codeArea"] = "DDD é obrigatório";
                $error .="<li>DDD é obrigatório</li>";
            }
            if (empty($phoneNumber)) 
            {
                $idFieldError[] = "phoneNumber";
                $errorMsg["phoneNumber"] = "Número de telefone é obrigatório";
                $error .="<li>Número de telefone é obrigatório</li>";
            }

            if ($user->validateEmail($email)==false) 
                {
                    $idFieldError[] = "email";
                    $errorMsg["email"] = "Formato de email incorreto";
                    $error .="<li>Formato de email incorreto</li>";
                }

            if ($user->userFound['userLogin']==true) 
                {
                    $idFieldError[] = "userLogin";
                    $errorMsg["userLogin"] = "Já está registrado";
                    $error .="<li>Usuário ". $user->userLogin ." Já está registrado</li>" ;
                }
            
            if ($user->userFound['email']==true) 
                {
                    $idFieldError[] = "email";
                    $errorMsg["email"] = "Email ". $user->email ." Já está registrado";
                    $error .="<li>Email ". $user->email ." Já está registrado</li>" ;
                }
            

            if (empty($name)) 
                {
                    $idFieldError[] = "name";
                    $errorMsg["name"] = "Nome é obrigatório";
                    $error .= "<li>Nome é obrigatório</li>";
                }

            if (empty($email)) 
                {
                    $idFieldError[] = "email";
                    $errorMsg["email"] = "Email não foi informado";
                    $error .= "<li>Email não foi informado</li>";
                }

            if (empty($userName)) 
                {
                    $idFieldError[] = "userName";
                    $errorMsg['userName'] = "Nome de usuário";
                    $error .= "<li>Nome de usuário</li>";
                }

            if (empty($password)) 
                {
                    $idFieldError[] = "password";
                    $errorMsg["password"] = "Senha não pode ficar vazia";
                    $error .= "<li>Senha não pode ficar vazia</li>";
                }

            if (empty($passwordConfirm)) 
                {
                    $idFieldError[] = "passwordConfirm";
                    $errorMsg["passwordConfirm"] = "";
                    $error .= "<li>Confirmação de senha ausente</li>";
                }
            if ($password !== $passwordConfirm) 
                {
                    $error .= "<li>Senha e confirmação de senha devem ser iguais</li>";
                }
            if (empty($error)) 
            {
                http_response_code( 200 );
                //include "./email.php";
                $user->register();
                $msgSuccess = "Usuário <strong>$userName</strong> foi criado com sucesso, verifique sua caixa de entrada ou spam em <strong>$email</strong>";
                echo json_encode( [ 'msg' => $msgSuccess ] );
            }
                
            else
            {
                $error .= "<script> responseError = ['Ford', 'BMW', 'Fiat'] </script>";
                http_response_code( 406 );
                echo json_encode( [ 'msg' => $error] );
            }
            
        break;

        case 'askReset':
            $email = $_POST['emailForgot'];
            $user = new User($pdo);
            $user->email = $email;

            if (empty($email)) 
            {
                $error  = "<li><strong>Email não pode ficar vazio</strong></li>" ;    # code...
            }
            if ($user->validateEmail($email)==false and !empty($email)) 
                {
                    $itemErrror = "<li>Formato de email incorreto ( <strong>$email</strong> )</li>";    
                    $error .= $itemErrror;
                }

                if (empty($error)) 
                {

                    $resetStatus  = $user->passReset();
                    http_response_code( 200 );
                    //include "./email.php";
                    echo json_encode( [ 'msg' => $resetStatus ] );
                }
                    
                else
                {
                    
                    http_response_code( 406 );
                    echo json_encode( [ 'msg' => $error ] );
                
                }
        break;

        case 'resetConfirmValidation':
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
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
            if (strlen($password)<6) 
                {
                    $error .= "<li>Senha não pode ter menos de 6 caracteres</li>";
                }

                if (empty($error)) 
                {
                    http_response_code( 200 );
                    //include "./email.php";
                    echo json_encode( [ 'msg' => "Redirecionando, aguarde..." ] );
                }
                    
                else
                {
                    http_response_code( 406 );
                    echo json_encode( [ 'msg' => $error ] );
                }
            
            break;

        case 'resetConfirm':
            // echo "<pre>" , var_dump($_POST) , var_dump($_SESSION) , "</pre>";
            $user = new User($pdo);
            $user->password = $_POST["password"];
            $user->validToken = $_SESSION["tokenSecure"];
            $user->resetAuth();
           
            break;
        
        default:
        
            break;
    }



    
    