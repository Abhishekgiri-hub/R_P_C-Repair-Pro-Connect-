<?php
require('inc/db_config.php');
require('inc/small_fun.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - Contact Us </title>

    <?php require('./inc/links.php'); ?>

</head>

<body class="bg-light">

    <?php require('./inc/header.php'); ?>

    <div class="container-fluid contact-jumbotron  text-light mt-5 ">
        <div class="  container d-flex justify-content-around align-items-center mt-5">
            <div class="col-sm-8  mt-5 p-5 text-center">
                <h1 class="pb-2 text-decoration-underline ">Contact Us</h1>
                <?php if(isset($_GET['user_name']))
                {
                    $user_name=$_GET['user_name'];

                    echo <<< EOD
                    <a><a href="index.php?user_name=$user_name" class="text-decoration-none text-white">Home</a>/Contact Us</a>
                    EOD;
                }
                else{
                    echo <<< EOD
                    <a><a href="index.php" class="text-decoration-none text-white">Home</a>/Contact Us</a>
                    EOD;
                }
                ?>
                
            </div>
        </div>
    </div>


    <!-- main body start -->
    <main>
        <section class="form-section c-section container-fluid mt-5">
            <div class="container">
                <div class="row py-3 " data-aos="fade-zoom-in" data-aos-delay="300" data-aos-offset="0">
                    <h6 class="text-primary fw-bold">- GET IN TOUCH </h6>
                    <h1 class="text-gray fs-1 pt-3 pb-2 fw-bold">Drop A Message to Us </h1>
                    <p class="text-primary w-md-75 fs-5 mt-3 ">Our objective at Assimox is to bring together our visitor's
                        societies and spirits with our own, communicating enthusiasm and liberality in the food we
                        share.</p>
                </div>
                <div class="row pb-5 mt-2 d-flex justify-content-between">
                    <div class="col-md-6  shadow-sm">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM  contact_detail";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo <<<conatactd
                        <div class="row py-2">
                                <iframe src="$row[g_map]"  loading="lazy" referrerpolicy="no-referrer-when-downgrade" height="220" >
                                </iframe>
                            </div>
                            <div class="address row contact-detail mt-2">
                                <h5 class="py-1 fw-bold">Address</h5>
                                <p><i class="bi bi-geo-alt-fill"></i> $row[company_address]</p>
                                <h5 class="fw-bold">Contact</h5>
                                <h6 class="py-1 "><i class="bi bi-telephone me-2 "></i>$row[contact_one]</h6>
                                <h6 class="pb-2"><i class="bi bi-telephone me-2 "></i>$row[contact_two]</h6>
                            </div>
                        </div>
                        conatactd;
                                }
                            } else {
                                echo '<div class="alert alert-danger" role="alert">No data present!</div>';
                            }
                           
                            ?>
                        </div>
                        <div class="col-md-5 py-2">
                            <div class="for-container row  shadow-sm  px-3 py-4 ">
                                <form action="" method="POST" >
                                    <div class="form-group mb-3">
                                        <label for="fname" class="form-label pb-1 fw-bold">Full Name</label> <br>
                                        <input type="text" name="name" required placeholder="Full Name" class="p-2 shadow-none form-control">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label pb-1 fw-bold">Email</label> <br>
                                        <input type="email" name="email" id="" required placeholder="Email" class="p-2 shadow-none form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="message" class="form-label pb-1 fw-bold">Message</label> <br>
                                        <textarea type="text" name="message" id="" required placeholder="Message" rows="3" class="py-2 shadow-none form-control" style="resize:none;"></textarea>
                                    </div>
                                    <div class="form-group mt-3 py-2 d-flex justify-content-end">
                                        <input type="submit" value="SEND" class="py-2 shadow-none w-50 form-control btn btn-success rounded-3" name="send">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
        </section>
    </main>



    <?php 
    if(isset($_POST['send'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['message'];

        $sql = " INSERT INTO `user_query`( `name`, `email`, `message` ) VALUES ( '$name',' $email','$msg') ";

        $res = $conn->query($sql);

        if($res === TRUE){
            // echo "Insert user query successfully!";
            echo " <script> alert('Send request successfully!');</script>";
        }
        else{
            echo "Error inserting user query failed!".mysqli_connect_error();
        }

    }
    
    
    ?>












    <?php require('./inc/footer.php'); ?>



</body>

</html>