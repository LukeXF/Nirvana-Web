<?php 
    // include the configs / constants for the database connection
    require_once("../../cdn/config/config.php");
    // Load header
    include '../../cdn/header.php';
    // load the login class
    require_once("../classes/AdminLogin.php");
    // Process the page loading
    require("../classes/ProcessPage.php");
    // Loads all the admin stats
    require("../classes/AdminOverview.php");

    $activeTab = "Home";

    // Load navbar
    include '../../cdn/navbar.php';

    // if logged in display content
    if ($login->isUserLoggedIn() == true) {
        include("views/a-index.php");
    } else {
        include("views/a-signin.php");
    }


    // Load footer
    //include("../assets/footer.php");
?>