<?php

session_start();
require "connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $country_id = $_POST['country_id'];
    $state_id = $_POST['id'];
    $state_name = $_POST['state_name'];
        echo ($state_id);
        // exit();

    $result = $database->updatestate(['country_id' => $country_id,'id' => $state_id,'state_name' => $state_name]);

    // print_r($result);
    // exit();

}

?>