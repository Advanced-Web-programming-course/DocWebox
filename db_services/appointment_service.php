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

function delete_appointment_ajax($conn, $deleteId)
{

    if (isset($_GET['deleteId'])) {

        $id = $_GET['deleteId'];
        delete_appointment($conn, $id);

    }
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

?>