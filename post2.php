<?php
session_start();
require "connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $city_name = $_POST['city_name'];
    $city_photo = $_FILES['city_photo']['name'];
    $state_id = $_POST['state_id'];

    $result = $database->addcity(['city_name' => $city_name , 'city_photo' => $city_photo,'state_id' => $state_id]);
    //  print_r($result);
}
?>