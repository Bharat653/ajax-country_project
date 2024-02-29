<?php
session_start();
require "connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $country_id = $_POST['country_id'];
    $state_id = $_POST['state_id'];
    $city_id = $_POST['city_id'];
    // print_r()

    $result = $database->addtask(['country_id' => $country_id , 'state_id' => $state_id , 'city_id' =>$city_id]);
   
}


?>