<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fórum Donklife</title>

  <link rel="stylesheet" href="./css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>

<?php
        include "./vendor/autoload.php";
        include "./assets-bunch.php";
        include "./model-config.php";
        include "./control-class-System.php";

        if (isset($_GET['mode'])) 
            {
              $mode = $_GET['mode'];   
            }
        else $mode = null;

        // echo "<pre>" ,  var_dump($_SERVER["HTTP_HOST"]) , "</pre>";
        // echo "<pre>" ,  var_dump($_SESSION) , "</pre>";
        $displayDivMsg = "d-none";
        $msgDisplay  = "";
        if (isset($_SESSION['mainMsg'])) 
            {
                $msgDisplay = $_SESSION['mainMsg'];
                unset($_SESSION['mainMsg']);
                $displayDivMsg = "";
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
              <h4>Bem Vindo!</h4>
              <h6 id="subTitle" class="font-weight-light">Preencha os campos abaixo</h6>

              <!-- Start form Personal -->
              <?php
                 include "./view-generic-modal.php";
              ?>
    <div class="container border mt-3">
        <div id="form-content" class="mb-2">
        <div class="alert alert-info <?=$displayDivMsg?>">
          <?=$msgDisplay?>
       </div>
            <?php
              $system = new System();
              $system->defaultStartForm = $mode;
              $system->setForm();
            ?>
        </div>
        <?php
                    if ($mode !="resetAuth") 
                    {
                        include "./view-adittional-login-info.php";
                    }  
            
        ?>
        <script>
          //alert("<?=$system->setAdditional()?>");
          displayAdd("<?=$system->setAdditional()?>");
        </script>
            <div id="responseContainer" class="text-center">
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
