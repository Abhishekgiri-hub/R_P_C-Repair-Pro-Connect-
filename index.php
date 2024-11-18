<?php
require('inc/db_config.php');
require('inc/small_fun.php');

// session_start();
// if(!(isset($_SESSION['login']) || $_SESSION['login'] == true)){
//     redirect('login.php');
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - Home</title>

    <?php require('./inc/links.php'); ?>

</head>

<body class="bg-light">

    <?php require('./inc/header.php'); ?>

    <!-- main -header  -->
    <div class="container-fluild header mt-5 d-flex justify-content-center align-items-center ">
        <div class=" main-title container d-flex justify-content-around py-2 ">
            <div class=" col-md-9 bg-light  p-5  log-reg  rounded-2  shadow-lg">
                <div class="row mt-2 pb-5">
                    <div class="text-container ">
                        <h3 class="text-gray fs-3 fw-bold">We Provide ...</h3>
                        <h1 class="text-capitalize py-3 text-gray fs-1 fw-bold">Home Appliances
                            Repair Service</h1>
                    </div>
                </div>
                <div class="btn-container d-flex  justify-content-start w-md-50 w-lg-50 w-100 gap-3 ">
                    <?php 
                    if(isset($_GET['user_name'])){   
                     $user_name = $_GET['user_name'];
                     $_subname = substr($user_name,0,4);
                    
                     echo <<< Profile
                     <a href="profile.php?user_name=$user_name" class="btn btn-warning rounded-2 px-4 py-2 text-capitalize">$_subname</a>
                     <a href="logout.php" class="btn btn-warning rounded-2 px-4 py-2 ">Logout</a>
                     Profile;
                    }
                    else{
                        echo <<< reg
                        <a href="register.php" class="btn btn-warning rounded-2 px-4 py-2">Register </a>
                        <a href="login.php" class="btn btn-warning rounded-2 px-4 py-2 ">Login</a>
                        reg;
                    }
                 ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->




    <main>

        <!-- services section -->
        <section class="c-bg c-height service-section  conatiner-fluid pt-5 pb-5">
            <div class=" container mt-5">
                <div class="row ">
                    <div class="col-sm-6 p-2">
                        <h6 class=" text-primary"> - OUR SERVICES</h6>
                        <h1 class="text-white fs-1 pt-3">Services We Do For You</h1>
                    </div>
                    <div class="col-sm-6 p-2">
                        <p class=" text-primary fs-5 "><i class="fa-regular fa fa-user  fs-3 text-warning mx-4 p-0"></i>We work to meet this ambitious goal by focusing on these key areas of
                            conservation.</p>
                    </div>
                </div>
                <div class="row container d-flex  pt-4 justify-content-between ">

                    <?php
                    $sql = "SELECT * FROM `service_list`";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        if(isset($_GET['user_name'])){

                        $user_name = $_GET['user_name'];
                        // Output data of each ro
                        while ($row = $result->fetch_assoc()) {
                            echo <<<query
                        <div class="col-md-3 border border-1 border-dark p-4   service-card  c-bg " onclick="window.location.href='service.php?user_name=$user_name'">
                        <div class="logo-img fs-1 text-warning ">
                        $row[service_logo]
                        </div>
                        <div class="mt-4">
                            <h6 class="text-white  fw-bold   service-title">$row[service_name]</h6>
                            <p class="text-secondary text-truncate  py-1">New normal that has done evolved from generation  to words a stremlined.</p>
                            <a class=" btn btn-sm btn-outline-primary fw-bold ">READ MORE +</a>
                        </div>
                        </div>

                        query;
                        }
                    }
                    else{
                        while ($row = $result->fetch_assoc()) {
                            echo <<<query
                        <div class="col-md-3 border border-1 border-dark p-4  text-center service-card  c-bg " onclick="window.location.href='service.php'">
                        <div class="logo-img fs-1 text-warning">
                        $row[service_logo]
                        </div>
                        <div class=" mt-4">
                            <h4 class="text-white fs-4 service-title">$row[service_name]</h4>
                            <p class="text-light">Service and Repaire</p>
                        </div>
                        </div>

                        query;
                        }
                    }

                    } else {
                        alert('alert alert-danger', 'No data present!');
                    }

                    ?>


                </div>
                <div class="container d-flex justify-content-center p-3 mt-3">
                <?php if(isset($_GET['user_name']))
                {
                    $user_name=$_GET['user_name'];

                    echo <<< EOD
                    <p class="text-white ">See the all services you want to search... <a href="service.php?user_name=$user_name" class="text-decoration-none text-warning">Click Here</a></p>
                    EOD;
                }
                else{
                    echo <<< EOD
                    <p class="text-white ">See the all services you want to search... <a href="service.php" class="text-decoration-none text-warning">Click Here</a></p>
                    EOD;
                
                }
                ?>
                    
                </div>
        </section>
        <!-- end services -->

        <!-- about our company image -->
        <section class="c-height container-fluid bg-light py-3 company-detail">
            <div class="container ">
                <div class="row mt-5 ">



                    <?php
                    // Fetch all data from the table
                    $sql = "SELECT * FROM `about_us` ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {

                            echo <<<About

                        <div class="col-lg-4 d-flex justify-content-sm-evenly ">
                        <div class="company-img p-5">
                            <img src="Admin/$row[image_path]" alt="not-found" class=" rounded-2 img-fluid ">
                            <div class="rating-container bg-primary p-2 rounded-2 text-center w-50">
                                <h4 class="text-light fw-bold fs-5">$row[company_rating]<span class="fs-3 fw-bold">K<sup class="fw-bold">+</sup></span></h4>
                                <p class="text-light fs-6">Satisfied Clients In Our Locality</p>
                            </div>
                        </div>
                        </div>

                        <div class="col-lg-8 pt-5 px-lg-5 ">
                        <h6 class="text-primary fw-bold "> - ABOUT OUR COMPANY</h6>
                        <h1 style="color:var(--bg-color); " class="fw-bold py-2">$row[company_title]</h1>
                        <h5 class="py-3 text-black fw-bold">
                            Bring to the table win-win survival strategies to ensure proactive domination ensure proactive domin.
                        </h5>
                        <p class="text-justify text-secondary">$row[company_desc]</p>

                        <div class="list-con row pt-3">
                            <div class="col-md-6">
                                <li class="fw-bold my-2">Highly Professional Staff</li>
                                <li class="fw-bold">100% Satisfaction Guarantee</li>
                                <li class="fw-bold my-2">Quality Control System</li>
                            </div>
                            <div class="col-md-6">
                                <li class="fw-bold my-2">Accourate Testing Process</li>
                                <li class="fw-bold">Unrivalle Workmanship</li>
                                <li class="fw-bold my-2">Timely Delivery</li>
                            </div>
                        </div>
                        </div>

                          
                        About;
                        }
                    } else {
                        alert('alert alert-danger', 'No data present!');
                    }

                    ?>





                </div>
            </div>

        </section>
        <!-- end about company -->

        <!-- contact section -->
        <section class="c-height c-bg conatiner-fluid contact-section py-5">
            <div class="container mt-sm-3">
                <div class="row py-4">
                    <h6 class="text-primary py-3">- GET ANSWER</h6>
                    <h1 class="text-white">Do You have Question Appliance Repairs</h1>
                </div>
                <div class="row d-flex justify-content-around mt-4 c-form-h" data-aos="fade-zoom-in" data-aos-delay="300" data-aos-offset="0">
                    <div class="col-md-8 bg-light rounded-2  shadow-sm py-4">
                        <div class="for-container row   px-3">
                            <form action="" method="POST">
                                <div class="form-group mb-3">
                                    <label for="fname" class="form-label pb-1 fw-bold">Full Name</label> <br>
                                    <input type="text" name="name" required placeholder="Full Name" class="p-2 shadow-none form-control p-2 shadow-none bg-light ">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email" class="form-label pb-1 fw-bold">Email</label> <br>
                                    <input type="email" name="email" id="" required placeholder="Email" class="p-2 shadow-none form-control p-2 shadow-none bg-light  ">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="message" class="form-label pb-1  fw-bold">Message</label> <br>
                                    <textarea type="text" name="message" id="" required placeholder="Message" rows="3" class="py-2  bg-light shadow-none form-control p-2 shadow-none" style="resize:none;"></textarea>
                                </div>
                                <div class="form-group mt-4 py-2 d-flex justify-content-end">
                                    <input type="submit" value="SEND" class="py-2  c-btn  shadow-none c-btn form-control p-2 shadow-none btn  text-white " name="send">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact  -->

        <!-- our team area -->
        <section class=" c-height our-team container-fluid py-5">
            <div class="container ">
                <div class="row mt-3">
                    <h6 class="text-primary fw-bold">- OUR PROFESSIONALS</h6>
                    <h1 class="text-gray pt-2 fw-bold ">Our Dedicated Team</h1>
                </div>
                <div class="row mt-4 d-flex  justify-content-between ">

                    <?php
                    // Fetch all data from the table
                    $sql = "SELECT * FROM  team_detail";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $i=1;
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo <<<team
                            <div class="col-lg-4 ">
                        <div class="card p-0">
                            <div class="card-image">
                                <img src="Admin/$row[team_image] " alt="">
                            </div>
                            <div class="card-content d-flex flex-column align-items-center">
                                <h4 class="pt-2 text-dark fw-bold ">$row[team_name]</h4>
                                <h5 class="text-dark fw-bold ">$row[post_name]</h5>

                                <ul class="social-icons d-flex justify-content-center">
                                    <li style="--i:1">
                                        <a href="$row[facebook]">
                                            <span class="fab fa-facebook" target="_blank"></span>
                                        </a>
                                    </li>
                                    <li style="--i:2">
                                        <a href="$row[twiter]">
                                            <span class="fab fa-twitter" target="_blank"></span>
                                        </a>
                                    </li>
                                    <li style="--i:3">
                                        <a href="$row[intagram]" target="_blank">
                                            <span class="fab fa-instagram"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </div>
                            </div>
                        
                        team;
                        if($i==4){
                            break;
                        }
                        $i=$i+1;
                        }
                    } else {
                        alert('alert alert-danger', 'No data present!');
                    }
                    ?>

                </div>

                <div class="container d-flex justify-content-center p-3 mt-5">
                <?php if(isset($_GET['user_name']))
                {
                    $user_name=$_GET['user_name'];

                    echo <<< EOD
                        <p class="text-gray fw-bold">See the all Team member... <a href="about.php?user_name=$user_name" class="text-decoration-none fw-bold">Click Here</a></p>
                    EOD;
                }
                else{
                    echo <<< EOD
                    <p class="text-gray fw-bold">See the all Team member... <a href="about.php" class="text-decoration-none fw-bold">Click Here</a></p>
                    EOD;
                }
                ?>
                    
                </div>
            </div>
        </section>
        <!-- end our team -->
    </main>


    <?php
    if (isset($_POST['send'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['message'];

        $sql = " INSERT INTO `user_query`( `name`, `email`, `message` ) VALUES ( '$name',' $email','$msg') ";

        $res = $conn->query($sql);

        if ($res === TRUE) {
            // echo "Insert user query successfully!";
            echo " <script> alert('Send request successfully!');</script>";
        } else {
            echo "Error inserting user query failed!" . mysqli_connect_error();
        }

        $conn->close();
    }


    ?>


    <?php require('./inc/footer.php'); ?>

</body>

</html>