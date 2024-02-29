<?php
session_start();
require 'connection.php';

if (isset($_POST['id'])) {
    
    $data = $database->getstateByCountryId($_POST['id']);
   

    $html = "";
    // print_r($data);
    // exit();
    foreach ($data as $state) {
  
        // $html .= '<option >Select State</option>';
        $html .= '<option value="" disabled selected>Select State</option>';
        $html .= '<option value="' . $state['id'] . '">' . $state['state_name'] . '</option>';
      
    } 

    echo $html;
} else {
     echo '<option value="">Select a state</option>';
}
?>