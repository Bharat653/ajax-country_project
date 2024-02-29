<?php

session_start();
require "connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $country_id = $_POST['id'];
    $country_name = $_POST['country_name'];
    // $country_photo = $_POST['editC_photo'];
        // echo ($country_name);
        // exit();

    $result = $database->updatecountry(['id' => $country_id,'country_name' => $country_name]);

    print_r($result);
    // exit();

}

?>