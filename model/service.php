<?php
class Service {
    public $id;
    public $title;
    public $price;
    public $specialization;


    public function __construct($id, $title, $price, $specialization){
        $this->$id = $id;
        $this->$title = $title;
        $this->$price = $price;
        $this->$specialization = $specialization;
    }

}



?>