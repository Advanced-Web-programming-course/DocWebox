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