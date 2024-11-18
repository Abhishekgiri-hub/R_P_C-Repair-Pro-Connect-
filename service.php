<?php
require('inc/db_config.php');
require('inc/small_fun.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - Services</title>

    <?php require('./inc/links.php'); ?>

</head>

<body class="bg-light">

    <?php require('./inc/header.php'); ?>

    <div class=" servive-jumbotron  text-light mt-5 container-fluid">
        <div class="container d-flex justify-content-around align-items-center mt-5">
            <div class="col-sm-8  mt-5 p-5 text-center">
                <h1 class="pb-2 text-decoration-underline">Services</h1>
                <li class="d-inline-block">
                    <?php
                    if (isset($_GET['user_name'])) {
                        $user_name = $_GET['user_name'];

                        echo <<< Profile
                     <a><a href="index.php?user_name=$user_name" class="text-decoration-none text-white">Home</a>/Services</a>
                     Profile;
                    } else {
                        echo <<< reg
                        <a href="contact.php" class="text-uppercase  link-item  text-decoration-none px-3 py-2 ">Services</a>
                        reg;
                    }
                    ?>

            </div>
        </div>
        <!-- <div class=" container d-flex justify-content-around mt-5 p-2">
        <div class="col-lg-7  py-5  d-flex justify-content-center  shadow-lg rounded-2 " style="background-color:  #011828;">
            <div class=" row d-flex  justify-content-between  align-align-items-center ">
            <div class="col ">
                <input type="search" name="search-name" id="search" class=" shadow-sm rounded-2 px-md-5 py-2 border border-1  "></div>
                <div class="col"><button type="button" class="btn btn-warning py-md-2 px-4 rounded-1 border-0 shadow-sm ">Search</button></div>
                
            </div>
        </div> -->
    </div>
    </div>

    <main>
        <!-- services section -->
        <section class=" c-section conatiner-fluid py-5 ">
            <div class="serch_container d-flex   justify-content-end pe-5 gap-3 pb-2">
                <label for="">
                    <input type="search" name="" id="search-box" class="form-control shadow-none ">
                </label>

                <label for="">
                    <button type="button" class="btn btn-outline-primary shadow-none  bi bi-search px-3"></button>
                </label>
            </div>
            <div class=" container mt-5">
                <div class="row ">
                    <div class="col-sm-6 p-2">
                        <h6 class=" text-primary fw-bold"> - OUR SERVICES</h6>
                        <h1 class="text-gray fs-1 pt-3 fw-bold">Services We Do For You</h1>
                    </div>
                    <div class="col-sm-6 p-2">
                        <p class="text-primary fs-5 "><i class=" fa-regular fa fa-user  fs-3  mx-4 p-0"></i>We work to meet
                            this ambitious goal by focusing on these key areas of
                            conservation.</p>
                    </div>
                </div>
                <div class="row mt-5 py-3 px-3 px-md-0 d-flex  justify-content-md-between justify-sm-content-center justify-content-center row-gap-md-5 " id="service">

                    <?php
                    $sql = "SELECT * FROM `services`";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        if (isset($_GET['user_name'])) {

                            while ($row = $result->fetch_assoc()) {
                                if ($row['by_machanic'] == 1) {
                                    $img = '<img src="./Machanic/' . $row['s_image'] . '" alt="" class=" mt-2 w-100 img-fluid rounded-2 mb-3 mb-lg-0">';
                                } else {
                                    $img = '<img src="Admin/' . $row['s_image'] . '" alt="" class=" mt-2 w-100 img-fluid rounded-2 mb-3 mb-lg-0">';
                                }


                                if ($row['approve'] == 1) {


                                    echo <<<query
                                <div class=" col-lg-6 col-md-10 service-card mb-3 bg-white rounded-2 shadow-sm  border  border-1 p-3 " style="max-width: 540px;">
                                    <div class="row g-0 ">
                                    <div class="col-md-4 ">
                                    $img
                                    </div>
                                    <div class="col-md-8 ps-md-4">
                                    <div class="card-body">
                                        <div class="row d-flex  justify-content-between pb-3">
                                        <div class="col">
                                            <h5 class="card-text fw-bold ">$row[s_name]</h5>
                                        </div>
                                        </div>
                                        <p class="card-text text-truncate ">$row[s_desc]</p>
                                        <div class="d-flex flex-column">
                                            <div class="row">
                                            <h6 class="card-text fw-bold pb-2">Rating</h6>
                                            </div>
                                            <div class="text-warning mb-1 me-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between mt-4 pb-2">
                                        <a href="bookin.php?id=$row[service_id]&user_name=$user_name" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm px-md-5  px-xl-5 px-4" type="button">Book Now</a>
                                        <a href="oneservices.php?id=$row[service_id]&user_name=$user_name" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm  px-md-5  px-xl-5 px-4" type="button">Details</a>
                                    </div>
                                </div>
                                </div>
                                 </div>
                                query;
                                }
                            }
                        } else {
                            // Output data of each ro
                            while ($row = $result->fetch_assoc()) {
                                echo <<<query
                            <div class=" col-lg-6 col-md-10 service-card mb-3 bg-white rounded-2 shadow-sm  border  border-1 p-3 " style="max-width: 540px;">
                                <div class="row g-0 ">
                                <div class="col-md-4 ">
                                <img src="Admin/$row[s_image]" class=" mt-2 w-100 img-fluid rounded-2 mb-3 mb-lg-0" alt="...">
                                </div>
                                <div class="col-md-8 ps-md-4">
                                <div class="card-body">
                                    <div class="row d-flex  justify-content-between pb-3">
                                    <div class="col">
                                        <h5 class="card-text fw-bold ">$row[s_name]</h5>
                                    </div>
                                    <div class="col">
                                    <h5 class="card-text text-center fw-bold ">Rs. $row[s_price]</h5>
                                    </div>
                                    </div>
                                    <p class="card-text text-truncate ">$row[s_desc]</p>
                                    <div class="d-flex flex-row">
                                        <div class="text-danger mb-1 me-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <span>510</span>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between mt-4 pb-2">
                                    <a  href="?is_login='yes'" class="btn btn-primary btn-sm px-md-5  px-xl-5 px-4" type="button">Book Now</a>
                                    <a href="oneservices.php?id=$row[service_id]" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm  px-md-5  px-xl-5 px-4" type="button">Details</a>
                                </div>
                            </div>
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
            </div>
        </section>
        <!-- end services -->

    </main>
    <?php
    if (isset($_GET['is_login'])) {
        echo '<script>alert("Please Login First");</script>';
    }
    ?>









    <?php require('./inc/footer.php'); ?>



</body>

</html>