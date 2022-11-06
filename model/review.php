<?php

class Review {
    public $id;
    public $patient_id;
    public $doctor_id;
    public $rating;
    public $comment;

    public function __construct($id, $patient_id, $doctor_id, $rating, $comment){
        $this->$id = $id;
        $this->$patient_id = $patient_id;
        $this->$doctor_id = $doctor_id;
        $this->$rating = $rating;
        $this->$comment = $comment;
    }

}



?>