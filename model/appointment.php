<?php 

class Appointment{
    public $id;
    public $patient_id;
    public $doctor_id;
    public $appointment_date;
    public $service_id;

    public function __construct($id, $patient_id, $doctor_id, $appointment_date, $service_id){
        $this->$id = $id;
        $this->$patient_id = $patient_id;
        $this->$doctor_id = $doctor_id;
        $this->$appointment_date = $appointment_date;
        $this->$service_id = $service_id;
    }

}


?>