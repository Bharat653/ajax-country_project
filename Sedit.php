<?php
session_start();
require "connection.php";


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $editstate = $_POST['id'];
 
    
    $result = $database->editstate(['id' => $editstate]);
    // print_r($result);
    // exit();
    echo json_encode($result);
   
  
}

?>