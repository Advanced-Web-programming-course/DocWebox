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
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: ../pages/main_page.php");
    }
}

function get_loggedin_user($conn, $type, $id)
{
    if ($type === 'd') {
        require_once "../db_services/doctor_service.php";
        return select_doctor_by_id($conn, $id);
    } else if ($type === 'p') {
        require_once "../db_services/patient_service.php";
        return select_patient_by_id($conn, $id);
    }
    return null;
}
