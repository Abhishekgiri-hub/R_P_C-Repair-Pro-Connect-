<?php 
require('./inc/db_config.php');
require('./inc/small_fun.php');

if (isset($_GET['email'])){

    filter_form_data($_GET);
    $email = $_GET['email'];
    $token = $_GET['token'];
    $stmt = $conn->prepare("SELECT * FROM `user_register` WHERE `email`=? AND `token`=? LIMIT 1");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $fetch = $result->fetch_assoc();

        if($fetch['is_verified']==1){
            echo '<script>alert("Email is already verified!");</script>';
        }
        else{

            $q = "UPDATE `user_register` SET `is_verified`=1 WHERE `email`='$email' AND `token`='$token'";

            $res = $conn->query($q);
        
            if($res){
                echo '<script>alert("Email is verified!");</script>';
            }
            else{
                echo '<script>alert("Email is not verified!");</script>';
            }
        }
        redirect('login.php');
}
    else{
        redirect('register.php');
    }
}




?>