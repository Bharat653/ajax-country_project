<?php

session_start();
require "connection.php";

if(isset($_POST['id'])){
    
    //     print_r($_POST['id']);
    // exit();
    $data = $database->getcitybystate($_POST['id']);
    // print_r($data);
    // exit();
    $html = "";
    
 
    foreach($data as $city){
        $html .= '<option value="" disabled selected>Select City</option>';
        $html .= '<option value="' . $city['id'] . '">' . $city['city_name'] . '</option>';
    }
    echo $html; 
}
else {
    echo '<option value = "">Select the city</option>';
}

?>