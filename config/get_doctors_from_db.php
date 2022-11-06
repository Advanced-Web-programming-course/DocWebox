<?php
function get_doctors($filters){
    include "../config/db_connection.php";

    $doctors = array();

    $sql = "SELECT * FROM doctor".$filters;
    echo $sql."<br>";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($doctors, array($row["id"],$row["full_name"],$row["phone"]));
    }
    } else {
    echo "0 results";
    }
    $conn->close();

    return $doctors;
}
?>