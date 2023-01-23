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

function update_appointment_to_availability($conn, $doctor_id, $day, $month, $year, $hour,  $appointment_id)
{

    require_once "../db_services/appointment_service.php";
    $appointment = select_appointment_by_id($conn, $appointment_id);
    $app_date = explode(" ", $appointment["appointment_date"])[0];
    $app_date = explode("-", $app_date);

    $app_year = $app_date[0];
    $app_month = $app_date[1];
    $app_day = $app_date[2];

    $app_date = $app_month . "/" . $app_day . "/" . $app_year;

    $time = explode(" ", $appointment["appointment_date"])[1];
    $timeArr = explode(":", $time);
    $time = $timeArr[0] . ":" . $timeArr[1];

    mysqli_query($conn, "UPDATE availability set doctor_id='$doctor_id', day='$day', month='$month', year='$year', hour='$hour' WHERE doctor_id='$doctor_id' AND day='$app_day' AND month='$app_month' AND year='$app_year' AND hour='$time'") or
        die("Query error: " . mysqli_error($conn));
}


function delete_appointment_availability($conn, $appointment_id)
{

    require_once "../db_services/appointment_service.php";
    $appointment = select_appointment_by_id($conn, $appointment_id);
    $doctor_id = $appointment["doctor_id"];
    $app_date = explode(" ", $appointment["appointment_date"])[0];
    $app_date = explode("-", $app_date);

    $app_year = $app_date[0];
    $app_month = $app_date[1];
    $app_day = $app_date[2];

    $app_date = $app_month . "/" . $app_day . "/" . $app_year;

    $time = explode(" ", $appointment["appointment_date"])[1];
    $timeArr = explode(":", $time);
    $time = $timeArr[0] . ":" . $timeArr[1];

    mysqli_query($conn, "DELETE FROM availability WHERE doctor_id='$doctor_id' AND day='$app_day' AND month='$app_month' AND year='$app_year' AND hour='$time'") or
        die("Query error: " . mysqli_error($conn));
}


function get_non_available_hours($conn, $doctor_id, $day, $month, $year)
{

    $non_available_hours = array();
    try {
        $sql = "SELECT * FROM availability WHERE doctor_id='$doctor_id' AND day='$day' AND month='$month' AND year='$year'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            array_push($non_available_hours, $row);
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
    }

    return $non_available_hours;
}
