
<?php

class User
    
    {
        public $pdoConn;
        public $name;
        public $email;
        public $userLogin;
        public $password;
        public $passwordConfirm;
        public $checkRegister;
        public $userFound = [];
        public $userIdModel = 65;
        public $userDeactivated = 1;
        public $lastInsertId;
        public $subjectMSG = "Donklife - Registro de nova conta";
        public $tokenRegister = "ABCDEFGHIJKLMNOPKRSTUVXZabcdefghijklmnopkrstuvxz1234567890";
        public $tokenGenerated;
        public $siteBase;
        public $fileValidation = "UserValidate";
        public $user_actkey;

        public function randonToken()
        {
            return mb_strimwidth(str_shuffle($this->tokenRegister), 0, 32);
        }

        public function validateEmail($email)
        {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public function __construct($dbObj)
        {
            $this->pdoConn = $dbObj;
            define("TOKEN_GENERATED", $this->randonToken());
        }
        
        public function userAvailability()
        {
            $this->userFound["userLogin"] = 0;
            $this->userFound["email"] = 0;

            $sqlGetUser = "SELECT * FROM phpbb_users WHERE username_clean ='" . $this->userLogin . "'";
            $sqlGetEmail = "SELECT * FROM phpbb_users WHERE user_email ='" . $this->email . "'";

            $result = $this->pdoConn->query($sqlGetUser);
            $rowCountUser = $result->rowCount();
            if ($rowCountUser >0) 
                {
                    $this->userFound['userLogin'] = 1;
                }
             $result = $this->pdoConn->query($sqlGetEmail);
             $rowCountEmail = $result->rowCount();
             if ($rowCountEmail >0) 
                {
                    $this->userFound['email'] = 1;
                }
            return $this->userFound;
        }

        public function register()
        {

            $sqlRegisterUser = "
                INSERT INTO
                    phpbb_users
                (
                    user_type,
                    group_id,
                    user_permissions,
                    user_perm_from,
                    user_ip,
                    user_regdate,
                    username,
                    username_clean,
                    user_password,
                    user_passchg,
                    user_email,
                    user_birthday,
                    user_lastvisit,
                    user_lastmark,
                    user_lastpost_time,
                    user_lastpage,
                    user_last_confirm_key,
                    user_last_search,
                    user_warnings,
                    user_last_warning,
                    user_login_attempts,
                    user_inactive_reason,
                    user_inactive_time,
                    user_posts,
                    user_lang,
                    user_timezone,
                    user_dateformat,
                    user_style,
                    user_rank,
                    user_colour,
                    user_new_privmsg,
                    user_unread_privmsg,
                    user_last_privmsg,
                    user_message_rules,
                    user_full_folder,
                    user_emailtime,
                    user_topic_show_days,
                    user_topic_sortby_type,
                    user_topic_sortby_dir,
                    user_post_show_days,
                    user_post_sortby_type,
                    user_post_sortby_dir,
                    user_notify,
                    user_notify_pm,
                    user_notify_type,
                    user_allow_pm,
                    user_allow_viewonline,
                    user_allow_viewemail,
                    user_allow_massemail,
                    user_options,
                    user_avatar,
                    user_avatar_type,
                    user_avatar_width,
                    user_avatar_height,
                    user_sig,
                    user_sig_bbcode_uid,
                    user_sig_bbcode_bitfield,
                    user_jabber,
                    user_actkey,
                    reset_token,
                    reset_token_expiration,
                    user_newpasswd,
                    user_form_salt,
                    user_new,
                    user_reminded,
                    user_reminded_time
                )                    
                SELECT
                    " . $this->userDeactivated . ",
                    group_id,
                    user_permissions,
                    user_perm_from,
                    user_ip,
                    user_regdate,
                    '". $this->name ."',
                    '". $this->userLogin ."',
                    MD5('". $this->password ."'),
                    user_passchg,
                    '". $this->email ."',
                    user_birthday,
                    user_lastvisit,
                    user_lastmark,
                    user_lastpost_time,
                    user_lastpage,
                    user_last_confirm_key,
                    user_last_search,
                    user_warnings,
                    user_last_warning,
                    user_login_attempts,
                    user_inactive_reason,
                    user_inactive_time,
                    user_posts,
                    user_lang,
                    user_timezone,
                    user_dateformat,
                    user_style,
                    user_rank,
                    user_colour,
                    user_new_privmsg,
                    user_unread_privmsg,
                    user_last_privmsg,
                    user_message_rules,
                    user_full_folder,
                    user_emailtime,
                    user_topic_show_days,
                    user_topic_sortby_type,
                    user_topic_sortby_dir,
                    user_post_show_days,
                    user_post_sortby_type,
                    user_post_sortby_dir,
                    user_notify,
                    user_notify_pm,
                    user_notify_type,
                    user_allow_pm,
                    user_allow_viewonline,
                    user_allow_viewemail,
                    user_allow_massemail,
                    user_options,
                    user_avatar,
                    user_avatar_type,
                    user_avatar_width,
                    user_avatar_height,
                    user_sig,
                    user_sig_bbcode_uid,
                    user_sig_bbcode_bitfield,
                    user_jabber,
                    '". TOKEN_GENERATED ."',
                    reset_token,
                    reset_token_expiration,
                    user_newpasswd,
                    user_form_salt,
                    user_new,
                    user_reminded,
                    user_reminded_time
            FROM
                phpbb_users
            WHERE
                user_id = '". $this->userIdModel ."'                 
            ";
           // var_dump("<pre>" , $sqlRegisterUser , "</pre>");
           // die;
            $this->pdoConn->exec($sqlRegisterUser);
            $scriptSubfolder = "/drafts/UpgradeDonkLife/";
            if ($_SERVER["SERVER_NAME"] !="localhost") 
                {
                    $scriptSubfolder ="/forum/register/";
                }
            $this->siteBase = $_SERVER["REQUEST_SCHEME"] . '://' . ''. $_SERVER['SERVER_NAME'] . $scriptSubfolder . $this->fileValidation . ".php?action=checkNewUser&token=" . TOKEN_GENERATED ;
            /*Using this var on mail file*/
            $mailArray = array(
                                'subjectMSG' => $this->subjectMSG,
                                'mailTo' => $this->email,
                                'personName' => $this->name,
                                'subjectMSG' => $this->subjectMSG,
                                'bodyMSG' => "
                                    Bem vindo(a) ". $this->name ." para completar seu cadastro 
                                        <a href='" . $this->siteBase . "'>clique aqui</a>
                                    <br>
                                    Caso não esteja visualizando a mensagem copie este link e cole 
                                    no seu navegador
                                     ". $this->siteBase ."
                                ",
                            );

            include "./email.php";
        }

       public function checkActivation()
        
        {
            $sqlCheckToken = "SELECT 1 FROM phpbb_users WHERE user_type ='1' AND " .
                "user_actkey='". $this->user_actkey ."'" 
            ;
            
        $pageParam ="register";
           $resultCheck = $this->pdoConn->query($sqlCheckToken);
           $rowCountCheck = $resultCheck->rowCount();
           if ($rowCountCheck ==0) 
            {
               $generalMsg = false;
               $_SESSION['mainMsg'] = "Não foi possível validar seu usuário, entre em contato com nosso suporte";
            }    
           else
            {
                $generalMsg = true;
                $_SESSION['mainMsg'] = "Usuário confirmado, faça seu login";
                $sqlUserValidate = "UPDATE phpbb_users SET user_type ='0' WHERE  user_actkey='". $this->user_actkey ."'";
                $this->pdoConn->query($sqlUserValidate);
                $pageParam = "login";
            }
            //echo $sqlCheckToken;
            header("location: ./index.php?mode=". $pageParam  ."");

        }

        public function passReset()
        {
            $sqlCheckEmail = "SELECT 1 FROM phpbb_users WHERE user_email='". $this->email ."' ";
            $resultCheck = $this->pdoConn->query($sqlCheckEmail);
            $rowCountCheck = $resultCheck->rowCount();
            if ($rowCountCheck ==0) 
            {
                $resetStatus = "Não foi possível econtrar no sistema o email informado  (<strong>$this->email</strong> )
                    . Por favor entre em contato com nosso suporte caso tenha certeza que se cadastrou com este email.
                    Se estiver incorreto, digite novamente 
                ";
            }
            else
            {
                $sqlToken = "UPDATE phpbb_users SET 
                    reset_token ='".$this->randonToken()."', 
                    reset_token_expiration = unix_timestamp(date_add(now(), interval 10 minute)),
                    user_newpasswd = '1'
                 WHERE user_email ='". $this->email ."'";
                $resetStatus = "Email enviado com sucesso para <strong>". $this->email ."</strong>. Lembrando que você tem 10 minutos para efetuar a troca, caso contrário sera necessário solicitar nova alteração";
            }
            return $resetStatus;
            //return $sqlToken;
        }



    }
