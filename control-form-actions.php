<?php

include "./model-db-control.php";

$postString = implode(",", $_POST);

echo json_encode( [ 'msg' => $postString ] );