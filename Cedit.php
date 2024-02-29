<?php
session_start();
require "connection.php";


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $editcountry = $_POST['id'];
 
    
    $result = $database->editcountry(['id' => $editcountry]);
    // print_r($result);
    // exit();
    echo json_encode($result);
   
  
}

?>