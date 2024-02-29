<?php
session_start();

require "connection.php";

$city_data = $database->getcity();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .delete-btn {
            background-color: red;
            color: #fff;
            border: 0;
            padding: 4px 10px;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <!-- <h1 style="color: white;">Users Panel</h1> -->
    <?php require_once "bar/upperbar.php" ?>

    <div>
        <table class="table table-green" style="width: 80%;
    margin: 70px auto;
    background-color: white;
    border-radius: 4px;">

            <thead>
                <tr>
                    <th scope="col">City Name</th>
                    <th scope="col">City photo</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($city_data as $data) {
                    echo "<tr>";
                    echo "<td>" . $data['city_name']    . "</td>";
                    echo "<td>" . $data['city_photo']    . "</td>";
                    echo "<td><button class='btn btn-warning' onclick=\"window.location.href='edit.php?editid=" . $data['id'] . "'\">edit</button></td>";
                    echo "<td><button class='delete-btn' data-id='{$data['id']}' >Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).on("click", ".delete-btn", function() {
            var cityid = $(this).data("id");
            // console.log(cityid);
            // alert(cityid);

            $.ajax({
                type :'post',
                url : 'delete/citydelete.php',
                data : {
                    id  :cityid
                },
                success:function(result){
                    console.log(data);
                }
            });
        });
    </script>
      
</body>

</html>