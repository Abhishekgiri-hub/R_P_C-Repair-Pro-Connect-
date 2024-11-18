
<?php
require('inc/db_config.php');
require('inc/small_fun.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - About Us</title>

    <?php require('./inc/links.php'); ?>

</head>

<body class="bg-light">

    <?php require('./inc/header.php'); ?>


    <div class="about-jumbotron  text-light mt-5 ">
        <div class="container d-flex justify-content-around align-items-center mt-5">
            <div class="col-sm-8  mt-5 p-5 text-center">
                <h1 class="pb-2 text-decoration-underline  ">About Us</h1>
                <?php if(isset($_GET['user_name']))
                {
                    $user_name=$_GET['user_name'];

                    echo <<< EOD
                    <a><a href="index.php?user_name=$user_name" class="text-decoration-none text-white">Home</a>/About Us</a>
                    EOD;
                }
                else{
                    echo <<< EOD
                    <a><a href="index.php" class="text-decoration-none text-white">Home</a>/About Us</a>
                    EOD;
                }
                ?>
                
            </div>
        </div>
    </div>

    <!-- main body start -->
    <main>
        <!-- about our company image -->
        <section class="c-section container-fluid bg-light py-3 company-detail">
            <div class="container ">
                <div class="row mt-5">
                    <?php
                    // Fetch all data from the table
                    $sql = "SELECT * FROM `about_us` ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {

                            echo <<<conatactd
                        <div class="col-lg-4 d-flex justify-content-sm-evenly " >
                        <div class="company-img p-5">
                            <img src="./Admin/$row[image_path] " alt="not-found" class=" rounded-2 img-fluid ">
                            <div class="rating-container bg-primary p-2 rounded-2 text-center w-50">
                                <h4 class="text-light fw-bold fs-5">$row[company_rating]<span class="fs-3 fw-bold">K<sup class="fw-bold">+</sup></span></h4>
                                <p class="text-light fs-6">Satisfied Clients In Our Locality</p>
                            </div>
                        </div>
                        </div>

                        <div class="col-lg-8 pt-5 px-lg-5 ">

                        <h6 class="text-primary fw-bold "> - ABOUT US</h6>
                        <h1 style="color:var(--bg-color); " class="fw-bold py-2">
                        $row[company_title]
                        </h1>
                        <p class="text-justify text-secondary py-3">
                        $row[company_desc]
                        </p>

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

                        conatactd;
                        }
                    } else {
                        alert('alert alert-danger', 'No data present!');
                    }

                    ?>


                </div>
            </div>
        </section>
        <!-- end about company -->

        <!-- our team area -->
        <section class=" c-section our-team container-fluid py-5">
            <div class="container " data-aos="fade-up" data-aos-easing="linear" data-aos-duration="2000">
                <div class="row mt-3">
                    <h6 class="text-primary fw-bold">- OUR PROFESSIONALS</h6>
                    <h1 class="text-gray pt-2 fw-bold ">Our Dedicated Team</h1>
                </div>
                <div class="row mt-4 py-5 d-flex justify-content-between">
                    <?php
                    // Fetch all data from the table
                    $sql = "SELECT * FROM  team_detail";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {

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
                        }
                    } else {
                        alert('alert alert-danger', 'No data present!');
                    }
                    ?>

                </div>
            </div>
        </section>
        <!-- end our team -->
    </main>

    <!-- end main body  -->
    <?php require('./inc/footer.php'); ?>



</body>

</html>