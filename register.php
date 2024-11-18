<?php
require('./inc/db_config.php');
require('./inc/small_fun.php');
require("./inc/sendgrid/sendgrid-php.php");

session_start();

function sendMail($gmail, $token)
{


    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("jaisabhi121@gmail.com", "RPC Team Member");
    $email->setSubject("Account Verification Link");
    $email->addTo($gmail);
    $email->addContent(
        "text/html",
        "Thanks for registering your account with mycompany website!
     Click here to verify your email address: <br />
     <a href='http://localhost/my_website/verify.php?email=$gmail&token=$token'>Click Me</a>

    "
    );
    $sendgrid = new \SendGrid('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');

    try {

        if ($sendgrid->send($email)) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        // echo 'Caught exception: '. $e->getMessage() ."\n";

        return false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPC - Register </title>

    <?php require('./inc/links.php'); ?>

</head>

<body>
    <?php require('./inc/header.php'); ?>

    <main class="mt-5 py-5 bg-light">
        <div class="container ">
            <div class="row">
                <div class="col-12 rounded-2 bg-white shadow-lg overflow-hidden">
                    <div class="row c-bg ">
                        <h3 class=" fw-bold py-4 text-center text-light "><i class="fa-regular fa fa-user me-3"></i>User Registration Form</h3>
                    </div>
                    <div class="p-4 p-md-5">
                        <form action="" method="POST" name="myForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="fullName">Full Name</label>
                                        <input type="text" name="fullname" class="form-control form-control-lg shadow-none " required />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline ">
                                        <label class="form-label fw-bold">Profile Picture</label> <br>
                                        <input type="file" name="image" placeholder="Image" required class="p-2  shadow-none form-control fs-5">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100 ">
                                        <label for="birthdayDate" class="form-label fw-bold ">Birthday</label>
                                        <input type="date" class="form-control form-control-lg shadow-none " name="birthdayDate" required />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 mt-2 pb-1 fw-bold ">Gender: </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input required" type="radio" name="inlineRadioOptions" id="femaleGender" value="Female" checked required />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input " type="radio" name="inlineRadioOptions" id="maleGender" value="Male" required />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input required class="form-check-input " type="radio" name="inlineRadioOptions" id="otherGender" value="Other" />
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="emailAddress">Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg shadow-none " required />

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="phoneNumber">Phone Number</label>
                                        <input type="tel" name="phoneNumber" class="form-control form-control-lg shadow-none " required />

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="firstName">State</label>
                                        <input type="text" name="state" class="form-control form-control-lg shadow-none " required />

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="lastName">City</label>
                                        <input type="text" name="city" class="form-control form-control-lg shadow-none " required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="firstName">Address</label>
                                        <input type="text" name="address" class="form-control form-control-lg shadow-none " required />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="lastName">PIN</label>
                                        <input type="text" name="pin" class="form-control form-control-lg shadow-none " required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="password">Password</label>
                                        <input type="password" name="pass" id="ps" class="form-control form-control-lg shadow-none " required />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label fw-bold" for="password">Confirm Password</label>
                                        <input type="password" name="cpass" id="cps" class="form-control form-control-lg shadow-none " required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-outline pb-2">
                                <input type="checkbox" name="term_con" id="" class="me-2"> I am agree with <a href="" class=" text-decoration-none">Term and Conditions</a>
                            </div>
                            <div class="mt-4 py-2  d-flex  justify-content-between align-items-center  ">
                                <input class="c-bg text-white  rounded-2 shadow-none border-0  p==y-2  fs-5 w-25 " type="submit" value="Register" name="user_register" />
                                <a href="login.php">Already Have an Account</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['term_con']) && isset($_FILES['image'])) {
        filter_form_data($_POST);
        //full name
        $fname = $_POST['fullname'];
        $dob = $_POST['birthdayDate'];
        $gen = $_POST['inlineRadioOptions'];
        $email = $_POST['email'];
        $mb_no = $_POST['phoneNumber'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $add = $_POST['address'];
        $pin = $_POST['pin'];
        $pss = $_POST['pass'];
        $cpss = $_POST['cpass'];
        $target_dir = "uploads/";

        // Get the filename and path of the uploaded image
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        $stmt = $conn->prepare("SELECT * FROM `user_register` WHERE  `email`=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            echo "<script>alert('User Email Already Registered!');</script>";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            echo "<script>alert('Only alphabets and white space are allowed');</script>";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format');</script>";
        } else if (!preg_match("/^[0-9]*$/", $mb_no)) {
            echo "<script>alert('Only numbers are allowed and phone number of 10 digits!');</script>";
        } else if (strlen($mb_no) != 10) {
            echo "<script>alert('Phone number of 10 digits!');</script>";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $state)) {
            echo "<script>alert('Only alphabets and white space are allowed');</script>";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
            echo "<script>alert('Only alphabets and white space are allowed');</script>";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $add)) {
            echo "<script>alert('Only alphabets and white space are allowed');</script>";
        } else if (!preg_match("/^[0-9]*$/", $pin)) {
            echo "<script>alert('Only numbers are allowed and only 6 Char !');</script>";
        } else if (strlen($pin) > 6) {
            echo "<script>alert('Only 6 Char !');</script>";
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $pss)) {
            echo "<script>alert('Only alphabets and numbers are allowed');</script>";
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $cpss)) {
            echo "<script>alert('Only alphabets and numbers are allowed');</script>";
        } else if ($pss != $cpss) {
            echo "<script>alert('Password and confirm password not matched!');</script>";
        } else {

            // Check file size (optional)
            if ($_FILES["image"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            }
            $token = bin2hex(random_bytes(16));

            // Upload the image to the specified directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {


                $q = "INSERT INTO `user_register`(`f_name`, `Image`, `d_of_b`, `gender`, `email`, `mb_no`, `state`, `city`, `address`, `pin`, `pwd`, `token`, `is_verified`) 
                VALUES ('$fname','$target_file','$dob','$gen','$email','$mb_no','$state','$city','$add','$pin','$pss','$token','0')";


                $res = mysqli_query($conn, $q);

                if ($res === TRUE && sendMail($email, $token)) {
                    $_SESSION['user_name'] = $fname;
                    $_SESSION['register'] = true;

                    echo "<script>alert('Register Successfully');
                    window.location.href='login.php'
                    </script>";
                } else {
                    echo "<script>alert('Registerartion Failled !')</script>";
                }
            }
        }
    }

    ?>

    <?php require('./inc/footer.php'); ?>

</body>

</html>