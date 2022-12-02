<?php

require_once "../config/db_connection.php";
require_once "../shared/utils.php";
require_once "../db_services/db_functions.php";

$table = get_table_name($type);
$email = $email_err =  "";
$password = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = clean_input($_POST["email"]);
    $password = clean_input($_POST["password"]);

    $email_err = check_empty($email, "Email cannot be empty");
    $password_err = check_empty($password, "Password cannot be empty");

    if (empty($email_err) && empty($password_err)) {
        $respose = check_credentials($conn, "admin", $email, $password, "a");
        if ($respose["success"]) {
            header("location: ../pages/main_page.php");
        } else {
            $respose = check_credentials($conn, $table, $email, $password, $type);
            if ($respose["success"]) {
                header("location: ../pages/main_page.php");
            } else {
                if ($respose["type"] == "email") {
                    $email_err = $respose["message"];
                } else if ($respose["type"] == "password") {
                    $password_err = $respose["message"];
                }
            }
        }
    }
}

function check_credentials($conn, $table, $email, $password, $type)
{
    $respose = array();
    $sql = "SELECT * FROM $table WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row != null) {
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            $id = $row["id"];
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["type"] = $type;


            $respose["success"] = true;
        } else {
            $respose["success"] = false;
            $respose["type"] = "password";
            $respose["message"] = "Authentication failed";
        }
    } else {
        $respose["success"] = false;
        $respose["type"] = "email";
        $respose["message"] = "Email doesnt exist";
    }
    return $respose;
}
