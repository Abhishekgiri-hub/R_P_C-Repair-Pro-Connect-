<?php
require('./inc/db_config.php');
require('./inc/small_fun.php');
session_start();



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - Book service </title>

    <?php require('./inc/links.php'); ?>

</head>

<body>
    <?php require('./inc/header.php'); ?>

    <main class="mt-5 py-5 bg-light">
        <div class=" container-md container-lg  shadow-md-lg shadow-none  rounded-2 border  border-1  overflow-hidden pb-5">
            <div class="row c-bg  ">
                <h4 class="fw-bold p-3 text-light text-uppercase  d-md-block   d-lg-block d-none  ">Confirm Booking</h4>
            </div>
            <div class="row mt-4  d-flex  justify-content-around row-gap-2  ">
                <?php
                if (isset($_GET['id'])) {

                    $id = $_GET['id'];
                    $q = "SELECT * FROM `services` WHERE `service_id` = '$id'";

                    $res = $conn->query($q);

                    if ($res) {

                        while ($row = $res->fetch_assoc()) {
                            
                            echo <<<EOF
                            <div class="col-lg-4 col-md-4">
                            <div class="card-body overflow-hidden bg-white border  border-1  rounded-2  shadow-sm ">
                                <img src="Admin/$row[s_image]" alt="" class="img-fluid card-img-top   img-thumbnail">
                                <div class=" mt-2  px-3">
                                    <h4 class="card-title fw-bold">$row[s_name]</h4>
                                    <p class="card-text text-muted mt-2 pb-3 text-truncate">$row[s_desc]</p>
                                </div>
                            </div>
                            </div>
                            
                            EOF;
                        }
                    }
                }

                ?>
                <div class="col-md-5 col-lg-5 ">
                    <div class="row">
                        <div class="col-md-11 col-lg-11 p-3 shadow-sm bg-white rounded-2 ">
                            <div class="row">
                                <h5 class="pb-3 fw-bold text-uppercase "> confirm Booking</h5>
                            </div>
    
                                    <div class="form-container">

                                    <form action="" method="POST">

                                    <div class="row">
                                    <div class="col-md-12 col-lg-12 mb-2">
                                        <label for="" class="form-lable pb-1 fw-bold ">Service Name</label>
                                        <input type="text" name="service_name"  class="form-control shadow-none w-100  text-capitalize" required>
                                    </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 mb-2">
                                                <label for="" class="form-lable pb-1 fw-bold ">Name</label>
                                                <input type="text" name="name" id="" class="form-control shadow-none w-100  text-capitalize" required>
                                            </div>
                                            <div class="col-md-6 col-lg-6 mb-2">
                                                <label for="" class="form-lable pb-1 fw-bold ">Contact</label>
                                                <input type="text" name="contact" id="" class="form-control  text-capitalize shadow-none w-100" required>
                                            </div>
                                        </div>
                                            <div class="row px-3 ">
                                                <label for="" class="form-lable fw-bold ps-0 pb-1">Address</label>
                                                <textarea name="address" id="" rows="2" style="resize: none;" class=" text-capitalize form-control shadow-none px-2"required></textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-4 px-3">
                                            <input class="px-2 btn btn-success text-decoration-none" name="book" type="submit" value="Confirm Bookingg"/>
                                        </div>
                                    </form>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php 

    if(isset($_POST['book']) && isset($_GET['user_name']) ){

        filter_form_data($_POST);

        $user_email = $_GET['user_name'];
        $service_name = $_POST['service_name'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        $q ="INSERT INTO `bookig_detail`(`service_name`, `user_email`, `user_name`, `contact`, `address`) VALUES ('$service_name','$user_email','$name','$contact','$address')";

        $res = $conn->query($q);

        if($res){
            echo '<script>
            alert("Booked successfully!");
            window.location.href="service.php?user_name='.$user_email.'"</script>';
        }
        else{
            
            echo "<script>alert('Failed!');</script>";
        }


    }


        
    
    
    
    
    ?>











    <?php require('./inc/footer.php'); ?>
</body>

</html>