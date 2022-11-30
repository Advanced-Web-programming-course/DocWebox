<?php

function select_patients($conn)
{
    $doctors = array();

    $sql = "SELECT * FROM patient WHERE 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($doctors, $row);
        }
    }

    return $doctors;
}

function select_patient_by_id($conn, $id)
{
    $id = htmlspecialchars($id);

    $sql = "SELECT * FROM patient WHERE id='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        return $row = $result->fetch_assoc();
    }

    return null;
}
