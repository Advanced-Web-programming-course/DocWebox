<?php
function insert_to_patients($fullname, $phone_num, $email, $pword, $img_url){
    include "connect_to_db.php";

    $sql = "INSERT INTO patient (fullname, phone_num, email, pword, img_url)
    VALUES ('$fullname', '$phone_num', '$email', '$pword', '$img_url')";

    try{
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
            echo "FullName : ".$fullname."<br>";
            echo "Phone number : ".$phone_num."<br>";
            echo "Email : ".$email."<br>";
            echo "Password : ".$pword."<br>";
            echo "Img url : ".$img_url."<br>";
        }
    }
    catch (Throwable $e) {
        echo "Error: " . $conn->error. "<br>";
     }
    echo"<br>";

    $conn->close();
}

function insert_to_doctors($fullname, $phone_num, $email, $pword, $rigion, $specialisation_id, $doctor_description, $img_url){
    include "connect_to_db.php";

    $sql = "INSERT INTO doctor (fullname, phone_num, email, pword, rigion, specialisation_id, doctor_description, img_url)
    VALUES ('$fullname', '$phone_num', '$email', '$pword', '$rigion', '$specialisation_id', '$doctor_description', '$img_url')";

    try{
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
            echo "FullName : ".$fullname."<br>";
            echo "Phone number : ".$phone_num."<br>";
            echo "Email : ".$email."<br>";
            echo "Password : ".$pword."<br>";
            echo "Rigion : ".$rigion."<br>";
            echo "Specialisation id : ".$specialisation_id."<br>";
            echo "Description : ".$doctor_description."<br>";
            echo "Img url : ".$img_url."<br>";
        }
    }
    catch (Throwable $e) {
        echo "Error: " . $conn->error. "<br>";
     }
    echo"<br>";

    $conn->close();
}

function insert_to_doctor_service($title, $price , $specialisation_id){
    include "connect_to_db.php";

    $sql = "INSERT INTO doctor_service (title, price , specialisation_id)
    VALUES ('$title', '$price', '$specialisation_id')";

    try{
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
            echo "Title : ".$title."<br>";
            echo "Price : ".$price."<br>";
            echo "Specialisation_id : ".$specialisation_id."<br>";
        }
    }
    catch (Throwable $e) {
        echo "Error: " . $conn->error. "<br>";
     }
    echo"<br>";

    $conn->close();
}

function insert_to_appointment($patient_id, $doctor_id , $appointment_date, $service_id){
    include "connect_to_db.php";

    $sql = "INSERT INTO appointment (patient_id, doctor_id , appointment_date, service_id)
    VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$service_id')";

    try{
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
            echo "Patient id : ".$patient_id."<br>";
            echo "Doctor id : ".$doctor_id."<br>";
            echo "Appointment Date : ".$appointment_date."<br>";
            echo "Service id : ".$service_id."<br>";
        }
    }
    catch (Throwable $e) {
        echo "Error: " . $conn->error. "<br>";
     }
    echo"<br>";

    $conn->close();
}

function insert_to_review($patient_id, $doctor_id , $rating, $comment){
    include "connect_to_db.php";

    $sql = "INSERT INTO review (patient_id, doctor_id , rating, comment)
    VALUES ('$patient_id', '$doctor_id', '$rating', '$comment')";

    try{
        if ($conn->query($sql) === TRUE) {
            echo "New review created successfully<br>";
            echo "Patient id : ".$patient_id."<br>";
            echo "Doctor id : ".$doctor_id."<br>";
            echo "Rating : ".$rating."<br>";
            echo "Comment : ".$comment."<br>";
        }
    }
    catch (Throwable $e) {
        echo "Error: " . $conn->error. "<br>";
     }
    echo"<br>";

    $conn->close();
}

function insert_to_admin($email, $pword){
    include "connect_to_db.php";

    $sql = "INSERT INTO admin (email, pword )
    VALUES ('$email', '$pword')";

    try{
        if ($conn->query($sql) === TRUE) {
            echo "New admin created successfully<br>";
            echo "Email : ".$email."<br>";
            echo "Password : ".$pword."<br>";
        }
    }
    catch (Throwable $e) {
        echo "Error: " . $conn->error. "<br>";
     }
    echo"<br>";

    $conn->close();
}
?>