<?php

@include 'conn.php';

session_start();

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $user_type = $_POST['user_type'];
    
    $select = "SELECT * FROM regtab WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            header('location: home.php');

        }
        elseif($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            header('location: home.php');

        }

    }else{
        $error[] = 'incorrect email or password!';
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/png" href="LTI-v.jpg">
</head>
<body>
    <div class="main">
        <?php include 'header.php'; ?>
        <form action="" method="post"><div class="form">
            <h2>Login Here</h2>
            <font color="red"><?php
            if(isset($error)) {
                foreach($error as $error) {
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?></font>
            <input type="email" name="email" placeholder="Enter Email Here">
            <input type="password" name="password" placeholder="Enter Password Here">
            <button class="btnn" name="submit"><a href="home.php">Login</a></button>

            <p class="link">Don't have an account<br>
            <a href="signup.php">Sign up</a> here</p>
            <p class="liw">Log in with</p>

            <div class="icon">
                <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
            </div>
        </div></form>
    </div>
    </body>
</html>