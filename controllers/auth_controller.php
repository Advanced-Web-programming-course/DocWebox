<?php
session_start();

function ensure_auth()
{
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
        header("location: ../pages/login_page.php");
    }
}

function if_auth_redirect_to_main()
{
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        header("location: ../pages/login_page.php");
    }
}
