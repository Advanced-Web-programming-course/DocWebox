<?php
function add_appointment_to_availability($conn, $doctor_id, $day, $month, $year, $hour)
{

    $sql = "INSERT INTO availability (doctor_id, day, month, year, hour)
    VALUES ('$doctor_id', '$day','$month', '$year', '$hour')";

    try {
        if ($conn->query($sql) === TRUE) {
            return true;
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }
}
