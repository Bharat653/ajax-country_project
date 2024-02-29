<?php

session_start();
require "../connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
$Sdelete_id = $_POST["id"];
// print_r($Cdelete_id); 


$result = $database->statedelete(['id' => $Sdelete_id]);

// $result = $database->statedelete(['id' => ])
}

?>