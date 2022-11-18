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

        $sql = "SELECT * FROM $table WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row != null) {
            $hashedPassword = $row["password"];

            if (password_verify($password, $hashedPassword)) {
                $id = $row["id"];
                $full_name = $row["full_name"];
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["email"] = $email;
                $_SESSION["type"] = $type;
                $_SESSION["full_name"] = $full_name;
                header("location: ../pages/main_page.php");
            } else {
                $password_err = "Authentication failed";
            }
        } else {
            $email_err = "Email doesnt exist";
        }
    }
}
