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
