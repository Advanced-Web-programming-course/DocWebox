<?php
function select_appointments_by_patient_id($conn, $patient_id)
{
    $patient_id = htmlspecialchars($patient_id);
    $appointments = array();

    $sql = "SELECT * FROM appointment WHERE patient_id='$patient_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($appointments, $row);
        }
    }

    return $appointments;
}
function delete_appointment($conn, $id)
{
    $sql = "DELETE FROM appointment WHERE id=' " . $id . " '";

    try {
        if ($conn->query($sql) === TRUE) {
            header("refresh:0");
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }
}

function create_appointment($conn, $patient_id, $doctor_id, $date, $service_id)
{
    $sql = "INSERT INTO appointment (patient_id, doctor_id, appointment_date, service_id)
    VALUES ('$patient_id', '$doctor_id', '$date', '$service_id')";

    try {
        if ($conn->query($sql) === TRUE) {
            return true;
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }
}

function edit_appointment($conn, $appointment_id,  $patient_id, $doctor_id, $new_date, $service_id)
{

    mysqli_query($conn, "UPDATE appointment set patient_id='$patient_id', doctor_id='$doctor_id', appointment_date='$new_date', service_id='$service_id' WHERE id='$appointment_id'") or
        die("Query error: " . mysqli_error($conn));
}



// function select_appointments_by_doctor_id($conn, $doctor_id)
// {
// $id = htmlspecialchars($id);

// $sql = "SELECT * FROM appointment WHERE doctor_id='$doctor_id'";

// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
// // output data of each row
// return $row = $result->fetch_assoc();
// }
// return null;
// }
