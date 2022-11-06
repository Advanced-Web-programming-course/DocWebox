<?php

class Doctor{
    
    public $id;
    public $full_name;
    public $phone;
    public $email;
    public $password;
    public $address;
    public $region;
    public $specialization;
    public $description;
    public $img_url;
    
    public function __construct($id, $full_name, $phone, $email, $password, $address, $region, $specialization, $description, $img_url){
        $this->$id = $id;
        $this->$full_name = $full_name;
        $this->$phone = $phone;
        $this->$email = $email;
        $this->$password = $password;
        $this->$address = $address;
        $this->$region = $region;
        $this->$specialization = $specialization;
        $this->$description = $description;
        $this->$img_url = $img_url;
    }



}


?>