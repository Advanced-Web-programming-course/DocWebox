<?php

function create_patient($fullname, $phone_num, $email, $pword, $img_url)
{
    include "../config/db_connection.php";
    $hashed_password = password_hash($pword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO patient (full_name, phone, email, password, img_url)
    VALUES ('$fullname', '$phone_num', '$email', '$hashed_password', '$img_url')";

    try {
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
            echo "FullName : " . $fullname . "<br>";
            echo "Phone number : " . $phone_num . "<br>";
            echo "Email : " . $email . "<br>";
            echo "Password : " . $pword . "<br>";
            echo "Img url : " . $img_url . "<br>";
        }
        return TRUE;
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
        return FALSE;
    }
    echo "<br>";

    $conn->close();
}

function create_doctor($fullname, $phone_num, $email, $pword, $address, $rigion, $specialisation, $doctor_description, $img_url)
{
    include "../config/db_connection.php";
    $hashed_password = password_hash($pword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO doctor (full_name, phone, email, password, address, region, specialization, description, img_url)
    VALUES ('$fullname', '$phone_num', '$email', '$hashed_password','$address', '$rigion', '$specialisation', '$doctor_description', '$img_url')";

    try {
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
            echo "FullName : " . $fullname . "<br>";
            echo "Phone number : " . $phone_num . "<br>";
            echo "Email : " . $email . "<br>";
            echo "Password : " . $pword . "<br>";
            echo "Address : " . $address . "<br>";
            echo "Rigion : " . $rigion . "<br>";
            echo "Specialisation id : " . $specialisation . "<br>";
            echo "Description : " . $doctor_description . "<br>";
            echo "Img url : " . $img_url . "<br>";
        }
        return TRUE;
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
        return FALSE;
    }
    echo "<br>";

    $conn->close();
}

function create_doctor_service($title, $price, $specialisation)
{
    include "../config/db_connection.php";

    $sql = "INSERT INTO service (title, price , specialization)
    VALUES ('$title', '$price', '$specialisation')";

    try {
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
            echo "Title : " . $title . "<br>";
            echo "Price : " . $price . "<br>";
            echo "Specialisation : " . $specialisation . "<br>";
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }
    echo "<br>";

    $conn->close();
}

function create_appointment($patient_id, $doctor_id, $appointment_date, $service_id)
{
    include "../config/db_connection.php";

    $sql = "INSERT INTO appointment (patient_id, doctor_id , appointment_date, service_id)
    VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$service_id')";

    try {
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
            echo "Patient id : " . $patient_id . "<br>";
            echo "Doctor id : " . $doctor_id . "<br>";
            echo "Appointment Date : " . $appointment_date . "<br>";
            echo "Service id : " . $service_id . "<br>";
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }
    echo "<br>";

    $conn->close();
}

function create_review($patient_id, $doctor_id, $rating, $comment)
{
    include "../config/db_connection.php";

    $sql = "INSERT INTO review (patient_id, doctor_id , rating, comment)
    VALUES ('$patient_id', '$doctor_id', '$rating', '$comment')";

    try {
        if ($conn->query($sql) === TRUE) {
            echo "New review created successfully<br>";
            echo "Patient id : " . $patient_id . "<br>";
            echo "Doctor id : " . $doctor_id . "<br>";
            echo "Rating : " . $rating . "<br>";
            echo "Comment : " . $comment . "<br>";
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }
    echo "<br>";

    $conn->close();
}

function create_admin($email, $fullname, $pword)
{
    include "../config/db_connection.php";
    $hashed_password = password_hash($pword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (email, full_name,password )
    VALUES ('$email', '$fullname','$hashed_password')";

    try {
        if ($conn->query($sql) === TRUE) {
            echo "New admin created successfully<br>";
            echo "Email : " . $email . "<br>";
            echo "Password : " . $pword . "<br>";
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }
    echo "<br>";

    $conn->close();
}
function get_doctors($filters)
{
    include "../config/db_connection.php";

    $doctors = array();

    $sql = "SELECT * FROM doctor" . $filters;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, array($row["id"], $row["full_name"], $row["phone"], $row["email"], $row["password"], $row["address"], $row["region"], $row["specialization"], $row["description"], $row["img_url"]));
        }
    } else {
        return "0 results";
    }
    $conn->close();

    return $doctors;
}
