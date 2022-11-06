<?php

function get_user_table_based_on_type($user_type)
{
    if ($user_type == "p") {
        return "patient";
    } else if ($user_type == "a") {
        return "admin";
    } else if ($user_type == "d") {
        return "doctor";
    }
    return null;
}

function get_user_type()
{
    // user_type
    $user_type = "p"; // p for patient
    if (isset($_GET["user_type"]) && $_GET["user_type"] != "") {
        $user_type = $_GET["user_type"];
    }
    return $user_type;
}
