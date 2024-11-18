<?php

require('./inc/db_config.php');
require('./inc/small_fun.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - Forget Password</title>

    <?php require('./inc/links.php'); ?>

</head>

<body>
    <?php require('./inc/header.php'); ?>

    <main class="mt-5 py-5 ">

        <div class="container mt-2">
            <div class="row   d-flex justify-content-center px-2">
                <div class="col-md-6 rounded-2 bg-white shadow-lg overflow-hidden">
                    <div class="row c-bg">
                        <h3 class="fw-bold text-light text-center py-4 ">Forget Password</h3>
                    </div>
                    <div class=" row p-4 p-md-3 mt-2">
                        <form action="" method="post" class="p-3">
                            <label for="email " class="form lable pb-2 fw-bold">Email:</label><br>
                            <input type="email" id="email" name="email" required class="form-control shadow-none p-2"><br>
                            <label for="new_password" class="form lable pb-2 fw-bold">New Password:</label><br>
                            <input type="password" id="new_password" name="new_password" required class="form-control shadow-none  p-2"><br>
                            <label for="confirm_password" class="form lable pb-2 fw-bold">Confirm Password:</label><br>
                            <input type="password" id="confirm_password" name="confirm_password" required class="form-control shadow-none p-2 pb-2"><br>

                            <div class=" col-12 d-flex justify-content-between align-items-center  px-3 py-2 w-100 ">
                                <input type="submit" value="Reset Password" class="form-control px-4 py-2 w-25  c-bg text-light shadow-none  ">
                                <a href="login.php" class="text-end ">Back to login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate email (you might want to add more validation)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Please enter your email address');</script>";
            exit;
        }

        // Check if passwords match
        else if ($new_password != $confirm_password) {
            echo "<script>alert('Password do not match !');</script>";
            exit;

        } else {

            // Prepare SQL statement to update password
            $sqlUpdate = "UPDATE `user_register` SET `pwd`='$new_password' WHERE `email`='$email'";

            if ($conn->query($sqlUpdate) === TRUE) {
                
                echo "<script>alert('Password updated successfully!');</script>";
                
            } else {
                echo  "" . $conn->error;
            }

        }

    }
    ?>




    <?php require('./inc/footer.php'); ?>

</body>

</html>