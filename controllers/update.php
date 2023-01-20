<?php 

include "../config/db_connection.php";

// Update Data
 if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $description = $_POST['description'];


        $sql = "UPDATE `doctor` 
        SET `description`='$description'
        WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode" => 1));
        } else {
            echo json_encode(array("statusCode" => 2));
        }
        mysqli_close($conn);
    }
?>