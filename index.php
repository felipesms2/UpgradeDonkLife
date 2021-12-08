<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <?php
        include "./assets-bunch.php";
    ?>
</head>
<body>
    <?php
        include "./view-generic-modal.php";
    ?>
    <div class="container border mt-5">
        <div id="form-content">
            <?php include "./view-form-register.php"?>
        </div>
        <?php include "./view-adittional-login-info.php"?>
    </div>
</body>
</html>