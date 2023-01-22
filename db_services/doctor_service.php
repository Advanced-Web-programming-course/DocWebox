<?php

function select_doctors($conn)
{
    $doctors = array();

    $sql = "SELECT * FROM doctor WHERE 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, $row);
        }
    }

    return $doctors;
}

function select_doctor_by_id($conn, $id)
{
    $id = htmlspecialchars($id);

    $sql = "SELECT * FROM doctor WHERE id='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        return $row = $result->fetch_assoc();
    }
    return null;
}

function select_doctors_by_specialization($conn, $specialization)
{
    $specialization = htmlspecialchars($specialization);

    $doctors = array();

    $sql = "SELECT * FROM doctor WHERE specialization='$specialization'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, $row);
        }
    }

    return $doctors;
}

function select_doctors_by_region($conn, $region)
{
    $region = htmlspecialchars($region);

    $doctors = array();
    $sql = "SELECT * FROM doctor WHERE region='$region'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, $row);
        }
    }

    return $doctors;
}

function select_doctors_by_specialization_region($conn, $specialization, $region)
{
    $region = htmlspecialchars($region);
    $specialization = htmlspecialchars($specialization);
    $doctors = array();

    $sql = "SELECT * FROM doctor WHERE specialization='$specialization' AND region='$region'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, $row);
        }
    }

    return $doctors;
}

function select_doctor_service_by_id($conn, $id)
{
    $id = htmlspecialchars($id);

    $sql = "SELECT * FROM service WHERE id='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        return $row = $result->fetch_assoc();
    }
    return null;
}

function select_services_by_specialization($conn, $specialization)
{
    $services = array();
    $sql = "SELECT * FROM service WHERE specialization = '$specialization'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($services, $row);
        }
    }

    return $services;
}

function edit_doctor_data($conn, $id, $name, $phone, $email, $address, $region, $specialization, $img_path)
{
    $row = select_doctor_by_id($conn, $_SESSION['id']);

    if ($img_path == "../images/") {
        $row = select_doctor_by_id($conn, $_SESSION['id']);
        $img_path = $row['img_url'];
    }

    mysqli_query($conn, "UPDATE doctor set full_name='$name', phone='$phone', email='$email', address= '$address', region='$region', specialization='$specialization', img_url='$img_path' WHERE id = '$id'") or
        die("Query error: " . mysqli_error($conn));
    header("Refresh:0");
}
