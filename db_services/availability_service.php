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


function get_non_available_hours($conn, $doctor_id, $day, $month, $year)
{

    $non_available_hours = array();
    try {
        $sql = "SELECT * FROM availability WHERE doctor_id='$doctor_id' AND day>='$day' AND month='$month' AND year='$year'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            array_push($non_available_hours, $row);
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }

    return $non_available_hours;
}