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
