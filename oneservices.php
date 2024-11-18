<?php
require 'inc/db_config.php';
require 'inc/small_fun.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - Single-Service</title>

    <?php require './inc/links.php';?>

    <style>
        .profile-img{
            width: 40px;
            height:40px;
            border-radius:50%;
        }
    </style>

</head>

<body class="bg-light">

    <?php require './inc/header.php';?>

    <div class=" servive-jumbotron  text-light mt-5 container-fluid">
        <div class="container d-flex justify-content-around align-items-center mt-5">
            <div class="col-sm-8  mt-5 p-5 text-center">
                <h1 class="pb-2 text-decoration-underline ">Service Details</h1>
                <?php if (isset($_GET['user_name'])) {
    $user_name = $_GET['user_name'];

    echo <<< EOD
                    <a><a href="index.php?user_name=$user_name" class="text-decoration-none text-white">Home</a>/Service Details</a>
                    EOD;
} else {
    echo <<< EOD
                    <a><a href="index.php" class="text-decoration-none text-white">Home</a>/ Service Details</a>
                    EOD;
}
?>

            </div>
        </div>
    </div>


<main>
<section class="c-height container-fluid py-5">
<div class=" container mt-md-5 mt-2">
                <div class="row">
                    <div class="row pb-5">
                        <div class="col-sm-6">
                            <h6 class=" text-primary fw-bold"> - SERVICE DETAILS</h6>
                            <h1 class="text-gray fs-1 pt-3 fw-bold">Services We Do For You</h1>
                        </div>
                        <div class="col-sm-6 ">
                            <p class="text-primary fs-5 "><i class=" fa-regular fa fa-user  fs-3  mx-4 p-0"></i>We work to meet
                                this ambitious goal by focusing on these key areas of
                                conservation.</p>
                        </div>
                    </div>

                    <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($id)) {
        $sql = "SELECT * FROM `services` WHERE `service_id` = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0 && isset($_GET['user_name'])) {

            $user_name = $_GET['user_name'];
            // Output data of each ro
            while ($row = $result->fetch_assoc()) {
                if ($row['by_machanic'] == 1) {
                    $img = '<img src="./Machanic/'. $row['s_image'] . '" alt="" class=" img-fluid w-100 rounded-3 img-thumbnail ">';
                } else {
                    $img = '<img src="Admin/'. $row['s_image'] . '" alt="" class="img-fluid w-100 rounded-3 img-thumbnail ">';
                }
                echo <<<query

                            <div class="row shadow-sm rounded-2  bg-white  d-flex justify-content-between  mt-md-4 mt-2 py-md-5 px-2 px-md-0 mx-auto py-2">
                            <div class="col-md-4 col-lg-4 ">
                            <div class="row ps-2">
                                $img
                            </div>
                            <div class="row d-flex  flex-row mt-3">
                            <span class="fw-bold ms-1 d-block ">Rating</span>
                            <div class="text-warning mt-2 ms-1">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            </div>
                             </div>
                             <div div class="col-md-8 col-lg-8 ps-md-5">
                            <div class="row ">
                                <div class="col order-md-1 order-lg-1 order-1 ">
                                    <h6 class=" text-primary fw-bold pb-2"> - SERVICE DETAILS</h6>
                                    <h1 class="fw-bold pb-3">$row[s_name]</h1>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-13 order-md-3 order-lg-3 order-2 ">
                                <p class="fs-5">$row[s_desc]</p>
                                <ul class="list-unstyled mt-2">
                                    <li class="fw-bold"><i class="bi bi-check2-circle text-primary fw-bold me-3"></i>Refrigerator Repair</li>
                                    <li class="fw-bold"><i class="bi bi-check2-circle text-primary fw-bold me-3"></i>Tv Unit Repair</li>
                                    <li class="fw-bold"><i class="bi bi-check2-circle text-primary fw-bold me-3"></i>Air Conditioner Repair</li>
                                </ul>
                            </div>

                            <div class="row d-flex  justify-content-end px-md-4 px-2">
                                    <a href="bookin.php?id=$id&user_name=$user_name" class="btn btn-primary px-md-4 px-lg-4 px-0 shadow-none mt-4 w-25">Book Now</a>

                            </div>
                            </div>
                            </div>


                            query;
            }
        } else {

            while ($row = $result->fetch_assoc()) {
                echo <<<query

                            <div class="row shadow-sm rounded-2  bg-white  d-flex justify-content-between  mt-4 py-5 px-2 px-md-0 mx-auto ">
                            <div class="col-md-4 col-lg-4 ">
                            <div class="row ps-2">
                                <img src="Admin/$row[s_image]" alt="" class="img-fluid w-100 rounded-3 img-thumbnail ">
                            </div>
                            <div class="row d-flex  flex-row mt-3">
                            <span class="fw-bold ms-1 d-block ">Rating</span>
                            <div class="text-warning mt-2 ms-1">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            </div>
                             </div>
                             <div div class="col-md-8 col-lg-8 ps-md-5">
                            <div class="row ">
                                <div class="col order-md-1 order-lg-1 order-1 ">
                                    <h6 class=" text-primary fw-bold pb-2"> - SERVICE DETAILS</h6>
                                    <h1 class="fw-bold pb-3">$row[s_name]</h1>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-13 order-md-3 order-lg-3 order-2 ">
                                <p class="fs-5">$row[s_desc]</p>
                                <ul class="list-unstyled mt-2">
                                    <li class="fw-bold"><i class="bi bi-check2-circle text-primary fw-bold me-3"></i>Refrigerator Repair</li>
                                    <li class="fw-bold"><i class="bi bi-check2-circle text-primary fw-bold me-3"></i>Tv Unit Repair</li>
                                    <li class="fw-bold"><i class="bi bi-check2-circle text-primary fw-bold me-3"></i>Air Conditioner Repair</li>
                                </ul>
                            </div>
                            </div>
                            </div>

                            query;
            }

        }
    }
}
?>

<!-- start -->

<div class="mx-auto bg-white row py-4 px-5 mt-3 shadow-sm rounded-2  ">

    <div class="col">
    <h1 class="fw-bold text-center p-2">FeedBack</h1>
    </div>
    <form  method="POST" action="" class="form">
    <div class="row  d-flex  align-items-center mt-4 pb-3 ">
        <div class="col-md-11 col-10">

                <?php if (isset($_GET['user_name']) && isset($_GET['id'])) {
    $user_name = $_GET['user_name'];
    $id = $_GET['id'];
    echo "<input type='hidden' name='email' value='$user_name'/>";
    echo "<input type='hidden' name='service-id' value='$id'/>";
}?>
                <input type="text" class="form-control shadow-none  p-2" name="comment" id="" placeholder="write somthing here.." required>

        </div>
        <div class="col-md-1 col-2 ">
            <div class="row d-flex  justify-content-center ">
                <div class="">
                    <input type="submit" value="Send" class="form control btn btn-sm btn-primary px-4  py-2" name="sub-feed">
                </div>
            </div>
        </div>
    </div>
    </form>

    <?php

$q = "SELECT * FROM `feed_back` WHERE  `service_id` = $id  ORDER BY `fdb_id` DESC ";
$res = $conn->query($q);
if ($res) {
    while ($row = $res->fetch_assoc()) {
        echo <<<EOF
        <div class="col-12 mt-2">
        <div class="title-text">
        <div class="d-flex align-items-center gap-1">
        <img src="./uploads/download.jpg" alt="notfound" class="profile-img">
        <h6 class="fw-bold p-2">
            $row[usr_email]
        </h6>
        </div>
        <div class="des  ms-md-5 mt-2">
            <p class="text-secondary ps-md-3 ps-5">
            $row[fbd_desc]
            </p>
        </div>
        </div>
        </div>
        EOF;

    }
}

?>

</div>
<!-- end -->
</div>
</div>
</section>

</main>

<?php

if (isset($_POST['sub-feed'])) {

    $email = $_POST['email'];
    $service_id = $_POST['service-id'];
    $comm = $_POST['comment'];

    $sql = "INSERT INTO `feed_back`(`fbd_desc`, `service_id`, `usr_email`)
     VALUES ('$comm','$service_id','$email')";

    $res = $conn->query($sql);

    if ($res) {
        echo "
        <script>
        window.location.href='oneservices.php?id=$service_id&user_name=$email'
        </script>";
    } else {

        echo '
        alert("Somthing went wrong!");
        ';

    }

}

?>





    <?php require './inc/footer.php';?>



</body>

</html>