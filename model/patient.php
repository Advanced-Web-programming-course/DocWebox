<?php 
class Patient{
    public $id;
    public $full_name;
    public $phone; 
    public $email; 
    public $password;
    public $img_url;

    public function  __construct($id, $full_name, $phone, $email, $password, $img_url){
        $this->$id = $id;
        $this->$full_name = $full_name;
        $this->$phone = $phone; 
        $this->$email = $email; 
        $this->$password = $password;
        $this->$img_url= $img_url;
    }


}


?>