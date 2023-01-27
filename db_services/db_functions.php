<?php

function create_patient($conn, $fullname, $phone_num, $email, $pword, $img_url)
{

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
            return $conn->insert_id;
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }
    echo "<br>";
}

function create_doctor($conn, $fullname, $phone_num, $email, $pword, $address, $rigion, $specialisation, $doctor_description, $img_url)
{

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
            return $conn->insert_id;
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }
    echo "<br>";
}

function create_doctor_service($conn, $title, $price, $specialisation)
{


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
}

function create_appointment($conn, $patient_id, $doctor_id, $appointment_date, $service_id)
{


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
}

function create_admin($conn, $email, $fullname, $pword)
{

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
}
function get_doctors($conn, $filters)
{


    $doctors = array();

    $sql = "SELECT * FROM doctor" . $filters;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, array($row["id"], $row["full_name"], $row["phone"], $row["email"], $row["password"], $row["address"], $row["region"], $row["specialization"], $row["description"], $row["img_url"]));
        }
    }

    return $doctors;
}
