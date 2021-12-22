<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI Admin</title>

  <link rel="stylesheet" href="./css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>

<?php
        include "./vendor/autoload.php";
        include "./assets-bunch.php";
        include "./model-config.php";

        if (isset($_GET['mode'])) 
            {
              $mode = $_GET['mode'];   
            }
        else $mode = null;

        // echo "<pre>" ,  var_dump($_SERVER["HTTP_HOST"]) , "</pre>";
        // echo "<pre>" ,  var_dump($_SESSION) , "</pre>";
        if (isset($_SESSION['mainMsg'])) 
            {
                $msgDisplay = $_SESSION['mainMsg'];
                unset($_SESSION['mainMsg']);
            }
    ?>


  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="./img/logo.jpg" alt="logo">
              </div>
              <h4>Vamos Começar!</h4>
              <h6 id="subTitle" class="font-weight-light">Faça seu cadastro para prosseguir</h6>

              <!-- Start form Personal -->
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
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->

  <!-- endinject -->
  <!-- inject:js -->

  <!-- endinject -->
</body>

</html>
