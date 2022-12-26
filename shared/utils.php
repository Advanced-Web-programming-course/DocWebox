<?php

// clean data for safety
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// returns an error message if variable is empty
function check_empty($var, $error)
{
    if (empty($var)) {
        return $error;
    }
    return "";
}

function validate_type($type)
{
    $type = clean_input($type);

    if ($type != "p" && $type != "d") {
        $type = "p";
    }

    return $type;
}

function get_table_name($type)
{
    if ($type == "d") {
        return "doctor";
    } else if ($type == "p") {
        return "patient";
    }
}
