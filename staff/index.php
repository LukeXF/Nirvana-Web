<?php 
    // include the configs / constants for the database connection
    require_once("../cdn/config/config.php");
    // Load header
    include '../cdn/header.php';
    // load the login class
    require_once("classes/Login.php");
    // Process the page loading
    require("classes/ProcessPage.php");

    $activeTab = "Home";

    // Load navbar
    include '../cdn/navbar.php';;


    // if logged in display content
    if ($login->isUserLoggedIn() == true) {
        include("views/v-index.php");
    } else {
        include("views/v-signin.php");
    }

?>