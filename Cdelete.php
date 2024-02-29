<?php

session_start();
require "../connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
$Cdelete_id = $_POST["id"];
// print_r($Cdelete_id); 


$result = $database->countrydelete(['id' => $Cdelete_id]);


// $result = $database->statedelete(['id' => ])
}

?>