<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <?php
        include "./vendor/autoload.php";
        include "./assets-bunch.php";
        include "./model-config.php";

        if (isset($_GET['mode'])) 
            {
              $mode = $_GET['mode'];   
            }
        else $mode = null;

        echo "<pre>" ,  var_dump($_SERVER["HTTP_HOST"]) , "</pre>";
        echo "<pre>" ,  var_dump($_SESSION) , "</pre>";
        if (isset($_SESSION['mainMsg'])) 
            {
                unset($_SESSION['mainMsg']);
            }
    ?>
</head>
<body>
    <?php
        include "./view-generic-modal.php";
    ?>
    <div class="container border mt-5">
        <div id="form-content" class="mb-2">
            <?php
            if ($mode=="resetAuth")
                {
                    include "./view-form-reset-auth.php";
                }
            else
            {include "./view-form-register.php";}
            ?>
        </div>
        <?php
                    if ($mode !="resetAuth") 
                    {
                        include "./view-adittional-login-info.php";
                    }  
            
        ?>
        <div id="responseContainer">
            
        </div>
    </div>
</body>
</html>