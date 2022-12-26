<?php

function select_admin_by_id($conn, $id)
{
    $id = htmlspecialchars($id);

    $sql = "SELECT * FROM admin WHERE id='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        return $row = $result->fetch_assoc();
    }

    return null;
}
