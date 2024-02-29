<?php
session_start();
require "connection.php";

$state_data = $database->getstate();
$country_Data = $database->getcountry();
 
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
        /* body {
            background-image: url('https://images.pexels.com/photos/1420440/pexels-photo-1420440.jpeg?auto=compress&cs=tinysrgb&w=600');
        } */

        .edit-btn {
            background-color: yellowgreen;
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
                    <th scope="col">State Name</th>
                    <th scope="col">State photo</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($state_data as $data) {
                    echo "<tr>";
                    echo "<td>" . $data['state_name']    . "</td>";
                    echo "<td>" . $data['state_photo']    . "</td>";
                    echo "<td><button class='edit-btn' data-id='{$data['id']}' >Edit</button></td>";
                    echo "<td><button class='delete-btn' data-id='{$data['id']}' >Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                     
                    </div>
                    <div class="modal-body">
                        <div>
                            <input type="text" id="edit_id" placeholder="State Name" hidden>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                <select  id="country_id" class="form-control" required >
                                    <option>Select Country</option>
                                    <?php foreach ($country_Data as $data) : ?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['country_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="row">
                                    <i class="fas fa-book"></i>
                                    <input type="text" id="edit_state" placeholder="state Name" required>
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
    </div>
    <script>
        $(document).on("click", ".delete-btn", function() {
            var sid = $(this).data("id");
            // alert(cid);

            $.ajax({
                type: 'post',
                url: 'delete/Sdelete.php',
                data: {
                    id: sid
                },

                success: function(data) {
                    // alert (data);
                    console.log(data);
                    // $('form')[0].reset();
                }
            });
        });
    </script>

    <script>
        // edit //
        $(document).on("click", ".edit-btn", function() {
            $("#exampleModal").modal('show');
            var stateid = $(this).data("id");
            // alert(countryid); 

            // $('form')[0].reset();
            $.ajax({
                type: 'post',
                url: 'Sedit.php',
                dataType: 'json',
                data: {
                    id: stateid
                },
                success: function(data) {
                    $("#country_id").val(data['country_id']);
                    $("#edit_id").val(data['id']);
                    $("#edit_state").val(data['state_name']);
                    console.log(data['state_name'])
                }
            });
        });

        $(document).on("click", "#edit-submit", function() {
            var countryid = $('#country').val();
            var stateid = $("#edit_id").val();
            var statename = $("#edit_state").val();
            // alert(countryid);
            $.ajax({
                type: 'post',
                url: 'updateS.php',
                data: {
                    // id:countryid,
                    countryid: countryid,
                    id: stateid,
                    state_name: statename
                },
                success: function(data) {
                    console.log(data);

                    // $('#exampleModal')[0].reset();
                }
            })
        })
    </script>
</body>

</html>