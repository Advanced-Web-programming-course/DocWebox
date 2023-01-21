<?php

function select_patients($conn)
{
    $patients = array();

    $sql = "SELECT * FROM patient WHERE 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            array_push($patients, $row);
        }
    }

    return $patients;
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

function delete_patient_by_id($conn, $id)
{
    $sql = "DELETE FROM patient WHERE id='$id'";

    try {
        if ($conn->query($sql) === TRUE) {
            return true;
        }
    } catch (Throwable $e) {
        echo "Error: " . $conn->error . "<br>";
        return false;
    }

}

function edit_patient_data($conn, $id, $name, $phone, $email, $img_path)
{
    if($img_path == "../images/")
    {
        $row = select_patient_by_id($conn, $_SESSION['id']);
        $img_path = $row['img_url'];
    }

    mysqli_query($conn, "UPDATE patient set full_name='$name', phone='$phone', email='$email', img_url='$img_path' WHERE id = '$id'") or
    die("Query error: " . mysqli_error($conn));
    header("Refresh:0");
    
}