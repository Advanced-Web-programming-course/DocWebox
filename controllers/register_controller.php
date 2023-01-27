<?php

require_once "../config/db_connection.php";
require_once "../shared/utils.php";
require_once "../db_services/db_functions.php";

$table = get_table_name($type);
$name = $name_err = "";
$email = $email_err =  "";
$password = $password_err = "";
$phone = $phone_err = "";
$address = $address_err = "";
$region = $region_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"])) {
        $name = clean_input($_POST["name"]);
    }
    if (isset($_POST["email"])) {
        $email = clean_input($_POST["email"]);
    }
    if (isset($_POST["password"])) {
        $password = clean_input($_POST["password"]);
    }

    if (isset($_POST["phone"])) {
        $phone = clean_input($_POST["phone"]);
    }

    if (isset($_POST["address"])) {
        $address = clean_input($_POST["address"]);
    }
    if (isset($_POST["region"])) {
        $region = clean_input($_POST["region"]);
    }
    $specialization = "";
    if (isset($_POST["specialization"])) {
        $specialization = clean_input($_POST["specialization"]);
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    } else {
        # check if admin with that email exists
        $sql = "SELECT id FROM admin WHERE email = '$email'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows >= 1) {
                $email_err = "Email already exists";
            }
        }

        $sql = "SELECT id FROM $table WHERE email = '$email'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows >= 1) {
                $email_err = "Email already exists";
            }
        }
    }


    $name_err = check_empty($name, "Name cannot be empty");
    $password_err = check_empty($password, "Password cannot be empty");
    $phone_err = check_empty($phone, "Phone cannot be empty");
    $address_err = check_empty($address, "Address cannot be empty");
    $region_err = check_empty($region, "Region cannot be empty");

    if ($type == "d") {
        if (empty($email_err) && empty($name_err) && empty($password_err) && empty($phone_err) && empty($address_err) && empty($region_err)) {
            $id = create_doctor($conn, $name, $phone, $email, $password, $address, $region, $specialization, "", "http://localhost/DocWebox/images/user_image.png");

            if ($id > 0) {
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["type"] = "d";


                $respose["success"] = true;
                header("location: ../pages/main_page.php?type=d");
            } else {
                $email_err = "Something went wrong please try again";
            }
        }
    } else if ($type == "p") {
        if (empty($email_err) && empty($name_err) && empty($password_err) && empty($phone_err)) {
            $id = create_patient($conn, $name, $phone, $email, $password, "http://localhost/DocWebox/images/user_image.png");
            if ($id > 0) {
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["type"] = "p";


                $respose["success"] = true;
                header("location: ../pages/main_page.php?type=p");
            } else {
                $email_err = "Something went wrong please try again";
            }
        }
    }
}
