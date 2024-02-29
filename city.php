<?php
session_start();
require "connection.php";
$state_data = $database->getstate();
$city_data = $database->getcity();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <?php require_once "bar/upperbar.php"; ?>

    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Add City</span></div>
            <form action="city.php" method="post" enctype="multipart/form-data" >
            <div class="row">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                        <select name="state_id" class="form-control">
                            <option>Select State</option>
                            <?php foreach ($state_data as $data) : ?>
                                <option value="<?php echo $data['id']; ?>"><?php echo $data['state_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="row"  >
                            <i class="fas fa-book"></i>
                            <input type="text" name="city_name" placeholder="City Name" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-list"></i>
                            <input type="file" value="picture" name="city_photo"  >
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
    <script>
        $(document).ready(function(){
            $('form').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'post2.php',
                    data: new FormData(this),
                    contentType:false,
                    processData:false,
                    success: function(data) {
                        $('form')[0].reset();
                        // console.log(data)
                    }
                    

                });
            });
        });
    </script>
</body>

</html>