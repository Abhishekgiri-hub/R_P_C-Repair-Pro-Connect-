<?php
require('inc/db_config.php');
require('inc/small_fun.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - User profile</title>
    <?php require('./inc/links.php'); ?>


</head>

<body>
    <?php require('./inc/header.php'); ?>

    <main class="d-flex justify-content-between">
        <?php require('./inc/sidenav.php'); ?>
        <div class="col-md-10 col-12  px-5 pt-3 pb-5 content-area col-10 mt-2" id="profile">
            <h2 class="text-center fw-bold mb-4 p-2">Your Profile</h2>
            <div class="row border  border-2  rounded-2   shadow-sm p-3">
                <?php

                if (isset($_GET['user_name'])) {
                    $email = $_GET['user_name'];

                    $sql = "SELECT * FROM `user_register` WHERE `email` = '$email'";
                    $res = $conn->query($sql);

                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            echo <<< user_detail
                           <div class="col-md-4 col-lg-4 ">
                           <img src="$row[Image]" class="img-responsive img-fluid img-thumbnail rounded-4  w-100" alt="" />
                           </div>
                           <div class="col-md-8 col-lg-8 ps-md-5 mt-md-0 mt-3">
                           <div class="row p-2">
                           <div class="col-12 ">
                           <h5 class="fw-bold fs-4"><i class="fa-solid fa fa-user me-3"></i>$row[f_name] </</h5>
                           </div>
                           </div>
                           <div class="row mt-3">
                           <div class="col-md-6 col-lg-6 ">
                           <p class="fw-bold">Email:<span class="fw-lighter ms-2">$row[email]</span></p>
                           </div>
                           <div class="col-md-6 col-lg-6 ">
                           <p class="fw-bold">Contact:<span class="fw-lighter ms-2">$row[mb_no]</span></p>
                           </div>
                           </div>

                           <div class="row mt-2">
                           <div class="col-md-6 col-lg-6 ">
                           <p class="fw-bold">DOB:<span class="fw-lighter ms-2">$row[d_of_b]</span></p>
                           </div>
                           <div class="col-md-6 col-lg-6 ">
                           <p class="fw-bold">Gender:<span class="fw-lighter ms-2">$row[gender]</span></p>
                           </div>
                           </div>

                           <div class="row mt-2">
                           <div class="col-md-6 col-lg-6 ">
                           <p class="fw-bold">State:<span class="fw-lighter ms-2">$row[state]</span></p>
                           </div>
                           <div class="col-md-6 col-lg-6 ">
                           <p class="fw-bold">City:<span class="fw-lighter ms-2">$row[city]</span></p>
                           </div>
                           </div>
                           <div class="row mt-2">
                           <div class="col-md-6 col-lg-6 ">
                           <p class="fw-bold">Address:<span class="fw-lighter ms-2">$row[address]</span></p>
                           </div>
                           <div class="col-md-6 col-lg-6 ">
                           <p class="fw-bold">PIN:<span class="fw-lighter ms-2">$row[pin]</span></p>
                           </div>
                           </div>
                           </div>
                           <div class="row d-flex  text-end pb-3">
                            <div class="col">
                            <button  class="btn btn-outline-primary shadow-none  "onclick="document.getElementById('user-detail-edit-form').style.display='block'"><i class="fa fa-solid fa-edit" ></i></button>
                            </div>
                            </div>
                           
                           user_detail;
                            $_id = $row['user_id'];
                        }
                    }
                }

                ?>
            </div>

            <!-- edit form -->
            <div class="col-md-6 rounded-2 bg-white shadow-lg overflow-hidden" id="user-detail-edit-form" style="display:none; position:absolute; top:30px; right:5%;   ">
                <div class="row c-bg ">
                    <h3 class=" fw-bold py-2 text-center text-light "><i class="fa-regular fa fa-user me-3"></i>Edit Details</h3>
                </div>
                <div class="p-4">
                    <form action="" method="POST" name="myForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="firstName" class="form-control shadow-none " required placeholder="Full Name" />
                                </div>

                            </div>
                            <div class=" col-md-6 mb-1">
                            <input type="file" name="image" placeholder="Profile Image" required class=" shadow-none form-control form-check-label">
                        </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-1 d-flex align-items-center">
                                <div class="form-outline datepicker w-100">
                                    <input type="date" class="form-control  shadow-none " name="birthdayDate" required />
                                </div>

                            </div>
                            <div class="col-md-6 mb-1">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input required" type="radio" name="inlineRadioOptions" id="femaleGender" value="Female" checked required />
                                    <label class="form-check-label" for="femaleGender">Female</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" name="inlineRadioOptions" id="maleGender" value="Male" required />
                                    <label class="form-check-label" for="maleGender">Male</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        
                            <div class="col-md-12 mb-1">

                                <div class="form-outline">
                                    <input type="tel" name="phoneNumber" class="form-control  shadow-none " required placeholder="Phone No." />

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="state" class="form-control  shadow-none " required placeholder="State" />

                                </div>

                            </div>
                            <div class="col-md-6 mb-1">
                                <div class="form-outline">

                                    <input type="text" name="city" class="form-control  shadow-none " required placeholder="City" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <div class="form-outline">

                                    <input type="text" name="address" class="form-control  shadow-none " required placeholder="Address" />
                                </div>

                            </div>
                            <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" name="pin" class="form-control  shadow-none " required placeholder="Pin" />
                                </div>
                            </div>
                        </div>


                        <div class="mt-2 py-2  d-flex  justify-content-start  gap-3 align-items-center  ">
                            <input class="btn btn-success  rounded-2 shadow-none border-0  py-2 px-3  " type="submit" value="Submit" name="submit" />

                            <input class=" btn btn-danger  rounded-2 shadow-none border-0  py-2  px-3   " type="submit" value="Cancle" name="Cancle" onclick="document.getElementById('user-detail-edit-form').style.display='none'" />

                        </div>
                    </form>

                </div>
            </div>

            <!-- edit forn end -->

            <div class="row " id="bookservice">
            <h2 class="text-center fw-bold my-4 p-2 ">Booked Services</h2>
            <div class="row  rounded-2  shadow-md-lg p-4 d-flex  justify-content-between  ms-2 ms-md-0 ">
            <?php 

            if(isset($_GET['user_name'])){

                $user_name = $_GET['user_name'];

                $q = "SELECT * FROM `bookig_detail` WHERE `user_email` = '$user_name'";

                $res = $conn->query($q);

                if($res){

                    while($row = $res->fetch_assoc()){
                        $btn='';
                        if($row['cancle'] == 0){

                            $btn='<div class="card-footer pb-3 d-flex justify-content-between px-2 ">
                            <a href="?cancle='.$row['bookin_id'].'&user_name='.$user_name.'" class="btn btn-sm btn-outline-danger  p-2">Cancel Booking</a>

                        </div>';
                        }
                        if($row['cancle']==0){
                        echo <<<EOF
                    <div class="card-cantainer rounded-3 shadow-lg border-1  col-md-3 col-lg-4 overflow-hidden shadow-sm   ">
                    <div class="card-header ">
                        <h4 class="card-title text-center fw-bold py-4">$row[service_name]</h4>
                        <hr/>
                    </div>
                    <div class="card-body p-2  ">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                        <label class="fw-bold">Name</label>
                        <p >$row[user_name]</p>
                        </div>
                        <div class="col-md-6 col-lg-6">
                        <label class="fw-bold ">Book Date</label>
                        <p>$row[date]</p>
                        </div>
                    </div>
                    <label class="fw-bold ">Address</label>
                    <p>$row[address]</p>
                    </div>
                    <hr/>
                        $btn
                    </div>
                    EOF;
                        }
                    }


                }
                else{
                    echo "Error while fetching rows from database!";	
                }

            } 
            ?>

                
                
            </div>
            </div>
        </div>
        
    </main>





    <?php
    if (isset($_POST['submit'])  && isset($_FILES['image']) && isset($_GET['user_name'])) {

        $email = $_GET['user_name'];

        $fname = $_POST['firstName'];
        $dob = $_POST['birthdayDate'];
        $gen = $_POST['inlineRadioOptions'];
        $mb_no = $_POST['phoneNumber'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $add = $_POST['address'];
        $pin = $_POST['pin'];

        $target_dir = "uploads/";
        // Get the filename and path of the uploaded image
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // //Check if file already exists
        // if (file_exists($target_file)) {
        //     alert(" alert alert-danger ", "already present in data base!");
        //     exit();
        // }

        // Check file size (optional)
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        // Upload the image to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            // Prepare SQL statement to insert image path into database
            $sql = "UPDATE `user_register` SET `f_name`='$fname',`Image`='$target_file',`d_of_b`='$dob',`gender`='$gen',`mb_no`='$mb_no',`state`='$state',`city`='$city',`address`='$add',`pin`='$pin' WHERE `user_id` = '$_id'";
            
            $res = $conn->query($sql);

            if($res){
                echo '<script>window.location.href = "profile.php?user_name='.$email.'"</script>';
            }
            else{
                echo '<script>alert("Sonthing went wrong!")</script>';
            }

            
        } else {
            alert('alert alert-danger', 'not upload!');
        }
    }


    ?>

<?php
    if(isset($_GET['cancle']) && $_GET['user_name'] ){

        $user_name = $_GET['user_name'];
        $id = $_GET['cancle'];
       
        $q= "UPDATE `bookig_detail` SET `cancle`= 1  WHERE `bookin_id` = $id ";

        $res = $conn->query($q);

        if($res ){
            echo '<script>window.location.href="profile.php?user_name='.$user_name.'";</script>';
        }
        else{
            alert('alret alert-danger','Data not found!');
        }
    } 
    
    ?>





</body>

</html>