<?php
session_start();
require "connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $state_name = $_POST['state_name'];
    $state_photo = $_FILES['state_photo']['name'];
    $country = $_POST['country_id'];

    $result = $database->addstate([ 'state_name' => $state_name , 'state_photo' => $state_photo , 'country_id' =>$country]);
    //  print_r($result);
}
?>
