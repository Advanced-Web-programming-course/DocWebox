<?php

function select_doctors()
{
    require_once "../config/db_connection.php";

    $doctors = array();

    $sql = "SELECT * FROM doctor WHERE 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, $row);
        }
    } else {
        return null;
    }

    $conn->close();

    return $doctors;
}

function select_doctors_by_specialization($specialization)
{
    require_once "../config/db_connection.php";

    $doctors = array();

    $sql = "SELECT * FROM doctor WHERE specialization='$specialization'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, $row);
        }
    }

    $conn->close();

    return $doctors;
}

function select_doctors_by_region($region)
{
    require_once "../config/db_connection.php";

    $doctors = array();

    $sql = "SELECT * FROM doctor WHERE region='$region'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, $row);
        }
    } else {
        return null;
    }

    $conn->close();

    return $doctors;
}

function select_doctors_by_specialization_region($specialization, $region)
{
    require_once "../config/db_connection.php";

    $doctors = array();

    $sql = "SELECT * FROM doctor WHERE specialization='$specialization' AND region='$region'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, $row);
        }
    } else {
        return null;
    }

    $conn->close();

    return $doctors;
}
