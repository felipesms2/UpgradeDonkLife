<?php

    if (!isset($_SESSION)) 
        {
            session_start();        
        }
    
    //$typeRequest = $_SERVER["REQUEST_SCHEME"];
    //$mainSiteUrl = $_SERVER['HTTP_HOST'];

    if (!isset($_SERVER['HTTP_HOST'])) 
    {
        $_SERVER['HTTP_HOST'] = "";
    }
   // define("SCRIPT_FOLDER", $_SERVER['HTTP_HOST'] . "/drafts" . "/UpgradeDonkLife");



    