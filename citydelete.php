<?php

session_start();
require "../connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
$citydelete_id = $_POST["id"];
// print_r($Cdelete_id); 


$result = $database->citydelete(['id' => $citydelete_id]);

// $result = $database->statedelete(['id' => ])
}

?>