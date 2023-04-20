<?php
session_start(); 
include('db_connect.php');
$msg = false; 
if(isset($_POST['user_name'])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $query = "SELECT * FROM user WHERE user = '".$user_name."' AND password = '".$user_password."' LIMIT 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        header('Location: welcome.php');
    } else {
        $msg = "Incorrect Password";
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media.css">
    <title>Music Website Login</title>
</head>

<body>
    <header>
        <div class="left_bxl">
            <div class="content">
                <form method="post">
                    <h3>Login</h3>
                    <div class="card">
                        <label for="name">Name</label>
                        <input type="text" name="user_name" placeholder="Enter your username..." required>
                    </div>
                    <div class="card">
                        <label for="password">Password</label>
                        <input type="password" name="user_password" placeholder="Enter your user_password..." required>
                    </div>
                    <input type="submit" value="Login" class="submit">
                    <div class="check">
                        <input type="checkbox" name="" id=""><span>Remember Me.</span>
                    </div>
                    <p>Don't have an account?<a href="signup.php">Sign Up</a></p>
                </form>
            </div>
        </div>
        <div class="right_bxl">
            <img src="bg_img/wave3.jpg" alt="">
            <!-- <h3>Incorrect Password</h3> -->
            <?php
            echo('<h3>'.$msg.'</h3>');
            ?>
        </div>
    </header>
</body>

</html>