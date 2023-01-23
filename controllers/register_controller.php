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

    $name = clean_input($_POST["name"]);
    $email = clean_input($_POST["email"]);
    $password = clean_input($_POST["password"]);
    $phone = clean_input($_POST["phone"]);
    $address = clean_input($_POST["address"]);
    $region = clean_input($_POST["region"]);
    $specialization = "";
    $specialization = clean_input($_POST["specialization"]);

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
            $ok = create_doctor($name, $phone, $email, $password, $address, $region, $specialization, "", "http://localhost/DocWebox/images/user_image.png");
            if ($ok) {
                header("location: ../pages/login_page.php?type=d");
            }
        }
    } else if ($type == "p") {
        if (empty($email_err) && empty($name_err) && empty($password_err) && empty($phone_err)) {
            $ok = create_patient($name, $phone, $email, $password, "http://localhost/DocWebox/images/user_image.png");
            if ($ok) {
                header("location: ../pages/login_page.php?type=p");
            }
        }
    }
}
