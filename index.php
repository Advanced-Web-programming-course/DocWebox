<?php
ob_start();

include_once __DIR__ . "/config/initialize.php";

return header("location: ./pages/main_page.php");