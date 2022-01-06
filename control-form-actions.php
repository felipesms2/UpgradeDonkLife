<?php

    include "./model-db-control.php";
    include "./control-class-User.php";
    include "./model-config.php";
    
    $error ="";
    $idFieldError = [];
    $errorMsg = [];

    //$postString = implode(",", $_POST);
    //var_dump($_POST);
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
            $placeLive = $_POST['placeLive'];
            $codeArea = $_POST['codeArea'];
            $phoneNumber = $_POST['phoneNumber'];
            $birthDay = $_POST['birthDay'];

            // var_dump($_POST);

            if (isset($_POST['websites'])) 
                {
                    $websites = $_POST['websites'];
                }
            else
                {
                    $websites = array("none");
                }
            
            $user = new User($pdo);
            $user->email = $email;
            $user->name = $name;
            $user->password = $password;
            $user->userLogin = $userName;
            $user->extraData = array(
                    "codeArea" => $codeArea, 
                    "phonenNumber" => $phoneNumber, 
                    "placeLive" => $placeLive,
                    "websites" => $websites,
                    "birthDay" => $birthDay
                );
             //var_dump("<pre>" , json_encode($user->extraData) , "</pre>");
            $user->userAvailability();

            if (empty($codeArea)) 
            {
                $idFieldError[] = "codeArea";
                $errorMsg["codeArea"] = "DDD é obrigatório";
                $error .="<li>DDD é obrigatório</li>";
            }
            if (strlen($phoneNumber)<8) 
            {
                $idFieldError[] = "phoneNumber";
                $errorMsg["phoneNumber"] = "Número de telefone precisa ter ao menos 8 dígitos";            
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
                    $idFieldError[] = "userName";
                    $errorMsg["userName"] = "Este usuário (<strong>$userName</strong>) Já está registrado";
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
            if (strlen($password) <6) 
                {
                    $idFieldError[] = "password";
                    $errorMsg["password"] = "Senha deve ter ao menos 6 caracteres" ;
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
                    $errorMsg["passwordConfirm"] = "Confirmação de senha ausente";
                    $error .= "<li>Confirmação de senha ausente</li>";
                }
            if ($password !== $passwordConfirm) 
                {
                    $idFieldError[] = "passwordConfirm";
                    $errorMsg['passwordConfirm'] = "Senha e confirmação de senha devem ser iguais";
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
                
                $error .= "<script> 
                                errorField = " . json_encode($idFieldError) . ";
                                errorMsg = ". json_encode($errorMsg) ."; 
                            </script>";
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

        case 'checkEnter':

           // var_dump($_POST);
            $error = false;
            $userName = addslashes($_POST['userName']);
            $password = addslashes($_POST['password']);
            //$password = 444;
            $user = new User($pdo);
            $user->userLogin = $userName;
            $user->password = $password;
            $auth = $user->login();
            //var_dump($auth);
    
            if($auth ==true)
                {
                    http_response_code(200);
                }
            else 
                {
                    http_response_code(406);
                }
            //var_dump($_POST);
            echo json_encode( [ 'msg' => $auth ] );
        break;
        
        default:
        
            break;
    }



    
    