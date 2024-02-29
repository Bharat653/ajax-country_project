<?php
session_start();
require "connection.php";

if (isset($_REQUEST['submit'])){
    if(($_REQUEST['country_name'] == "") ){
        echo "All fields requierd";
    }
    else{
        $result = $database->addcountry();
   
    }
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <?php require_once "bar/upperbar.php"; ?>

    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Add Country</span></div>
            <form action="index.php" method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="row"  >
                            <i class="fas fa-book"></i>
                            <input type="text" name="country_name" placeholder="Country Name" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-list"></i>
                            <input type="file" value="picture" name="country_photo" >
                        </div>
                    </div>
                </div>
                <div class="row button">
                    <input type="submit" value="submit" name="submit">
                </div>
            </form>
        </div>
    </div>
    <?php require_once "bar/script.php"; ?>

    
  
</body>

</html>