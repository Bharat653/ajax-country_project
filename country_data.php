<?php
session_start();
require "connection.php";
$country_Data = $database->getcountry();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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

        .edit-btn {
            background-color: yellowgreen;
            border: 0;
            padding: 4px 10px;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <?php require_once "bar/upperbar.php" ?>
    <div>
        <table class="table table-green" style="width: 80%;
        margin: 70px auto;
        background-color: white;
         border-radius: 4px;">

            <thead>
                <tr>
                    <th scope="col">Country Name</th>
                    <th scope="col">country photo</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($country_Data as $data) {
                    echo "<tr>";
                    echo "<td>" . $data['country_name']    . "</td>";
                    echo "<td>" . $data['country_photo']    . "</td>";
                    echo "<td><button class='edit-btn' data-id='{$data['id']}' >Edit</button></td>";
                    echo "<td><button class='delete-btn' data-id='{$data['id']}' >Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        

        <!-- 8888888888888888888888888888888888888888888888888888888888888888888888888888888 -->

        <!-- <form method="post"> -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                        <div class="modal-body">
                            <div>
                                <input type="text" id="edit_id" placeholder="Country Name" hidden>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="row">
                                        <i class="fas fa-book"></i>
                                        <input type="text" id="edit_country" placeholder="Country Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="row">
                                        <i class="fas fa-list"></i>
                                        <input type="file" value="picture" id="editC_photo">
                                    </div>
                                </div>
                            </div>
                            <div class="row button">

                                <input type="submit" value="save" id="edit-submit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </form> -->

    </div>
    </div>
    <script>
        //delete//
        $(document).on("click", ".delete-btn", function() {
            var cid = $(this).data("id");
            // alert(cid);
            $.ajax({
                type: 'post',
                url: 'delete/Cdelete.php',
                data: {
                    id: cid
                },
                success: function(data) {
                    // alert (data);
                    // console.log(data);
                    $('form')[0].reset();
                }
            });
        });
    </script>
    <script>
        // edit //
        $(document).on("click", ".edit-btn", function() {
            $("#exampleModal").modal('show');
            var countryid = $(this).data("id");
            // alert(countryid); 
            // $('form')[0].reset();
            $.ajax({
                type: 'post',
                url: 'Cedit.php',
                dataType: 'json',
                data: {
                    id: countryid
                },
                success: function(data) {
                    $("#edit_id").val(data['id']);
                    $("#edit_country").val(data['country_name']);
                    //    $("#editC_photo") .val(data['country_photo']);
                    console.log(data['country_name'])
                }
            });
        });

        $(document).on("click", "#edit-submit", function() {
            var countryid = $("#edit_id").val();
            var countryname = $("#edit_country").val();
            // alert(countryname);
            $.ajax({
                type :'post',
                url :'updateC.php',
                data:{
                    // id:countryid,
                    id:countryid,
                    country_name : countryname
                },
                success:function(data){
                    console.log(data);
                    // $('#exampleModal')[0].reset();
                }
            })
        })
    </script>

</body>

</html>