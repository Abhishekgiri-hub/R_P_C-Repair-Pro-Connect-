<?php
require('inc/db_config.php');
require('inc/small_fun.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - Products</title>

    <?php require('./inc/links.php'); ?>

</head>

<body class="bg-light">

    <?php require('./inc/header.php'); ?>

    <div class=" servive-jumbotron  text-light mt-5 container-fluid">
        <div class="container d-flex justify-content-around align-items-center mt-5">
            <div class="col-sm-8  mt-5 p-5 text-center">
                <h1 class="pb-2 text-decoration-underline ">Products</h1>
                <?php if(isset($_GET['user_name']))
                {
                    $user_name=$_GET['user_name'];

                    echo <<< EOD
                    <a><a href="index.php?user_name=$user_name" class="text-decoration-none text-white">Home</a>/Products</a>
                    EOD;
                }
                else{
                    echo <<< EOD
                    <a><a href="index.php" class="text-decoration-none text-white">Home</a>/Single Services</a>
                    EOD;
                }
                ?>
                
            </div>
        </div>
    </div>


    <main>
    <section class="c-height container-fluid py-5">
            <div class=" container mt-3">
                <div class="row">
                    <div class="row pb-5">
                        <div class="col-sm-6 ">
                            <h6 class=" text-primary fw-bold"> -OUR PEODUCTS</h6>
                            <h1 class="text-gray fs-1 pt-3 fw-bold">Products  We have  For You</h1>
                        </div>
                    </div>
                </div>

                <div class="row d-flex  justify-content-between ">
                    <div class="col-lg-3 col-md-5 rounded-2  shadow-sm  overflow-hidden border border-1 p-0 ">
                        <div class="card-body p-0 m-0">
                            <img src="./img/blog-1-1.jpg " class="img-fluid w-100" alt="...">
                            <div class="row p-2">
                            <h5 class="card-title pt-1 fw-bold ">Air Conditioner</h5>
                            <p class="mt-2 text-truncate ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure a nam corporis neque dolores aspernatur nostrum cumque facere recusandae quidem?</p>
                            <div class="row pb-2 d-flex justify-content-center">
                            <a class="btn w-50  btn-sm shadow-none  btn-primary" onclick="document.getElementById('by-form').style.display='block'">By Now</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>   
    </main>

    <div class="row" id="by-form" style="display:none; position:fixed; top:20% ; left:35%; width:40%;">
    
        <div class="bg-white  shadow-lg rounded-2 p-3">
        <div class="row d-flex  justify-content-end px-2">
        <button class="text-end btn btn-sm shadow-none  border-0 w-25  text-decoration-none cursor-pointer" onclick="document.getElementById('by-form').style.display='none'">X</button>
        </div>
            
            <div class="form">
                <h6 class="text-center">Confirm To By</h6>
                <form action="" method="POST" class="p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="name" placeholder="Name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="phone" placeholder="Phone" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="address" placeholder="Address" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>








    <?php require('./inc/footer.php'); ?>



</body>

</html>