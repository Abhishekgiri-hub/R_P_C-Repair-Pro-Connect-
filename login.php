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
    <title>RPC - Login</title>

    <?php require('./inc/links.php'); ?>

</head>

<body>
    <?php require('./inc/header.php'); ?>

    <main class="mt-5 py-5 ">

        <div class="container mt-2">
            <div class="row   d-flex justify-content-center px-2">
                <div class="col-md-7 col-xlg-8 rounded-2 bg-white shadow-lg overflow-hidden">
                    <div class="row c-bg">
                        <h3 class="fw-bold text-light text-center py-3 "><i class="fa-regular fa fa-user me-3"></i>Login</h3>
                    </div>
                    <div class="p-4 p-md-4 mt-2">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col mb-4 pb-2">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="emailAddress">Email</label>
                                        <input type="email" class="form-control form-control-lg shadow-none " name="email" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-4 pb-2">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="password">Password</label>
                                        <input type="password" class="form-control form-control-lg shadow-none " name="password" required />
                                    </div>
                                </div>

                            </div>

                            <div class="mt-2 py-2  d-flex  justify-content-md-between align-items-center   flex-column flex-md-row flex-flex-lg-row  ">
                                <input class="c-bg text-white  rounded-2 shadow-none border-0 w-25  py-2" type="submit" value="Login" name="user_login" />
                                <div class="col-md-6 col-12 mt-3 mt-md-0 ps-3   flex-md-row flex-flex-lg-row  justify-content-between  align-items-center ">
                                <a href="register.php">Create New Account</a>
                                <a href="forgetpss.php" class=" ps-3">
                                    Forget Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

















     
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        filter_form_data($_POST);
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM `user_register` WHERE  `email`=? AND `pwd`=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0 || isset($_SESSION['user_name'])) {

            $fetch = $result->fetch_assoc();
            if($fetch['is_verified'] ==1){

            $_SESSION['login'] = true;
            echo "<script>alert('Login Successfully ')
                    window.location.href='index.php?user_name=$email'
            </script>";

            }
            else{
                echo "<script>alert('Please verify your email')</script>";
            }
        }
         else {

            echo "<script>alert('Invalid username or password')</script>";
        }
    }
    ?>


    <?php require('./inc/footer.php'); ?>

</body>

</html>