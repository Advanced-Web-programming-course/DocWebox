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
