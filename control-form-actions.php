<?php

    include "./model-db-control.php";
    $postString = implode(",", $_POST);
    $action = $_POST['action'];    

    switch ($action) {
        case 'registration':
            $postString .= $action;    
        break;
        
        default:
        
            break;
    }



    echo json_encode( [ 'msg' => $postString ] );
    