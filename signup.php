<?php

@include 'conn.php';

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpass']);
    $user_type = $_POST['user_type'];
    
    $select = "SELECT * FROM regtab WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';

    }
    else {
        if($pass != $cpass) {
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO regtab(name, email, password, user_type) VALUES ('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location: login.php');
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" type="image/png" href="LTI-v.jpg">
</head>
<body>
    <div class="main">
    <?php include 'header.php'; ?>
        <form action="" method="post"><div class="form">
            <h2>Sign up here</h2>
            <font color="red"><?php 
            if(isset($error)) {
                foreach($error as $error) {
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?></font>
            <input type="text" name="name" placeholder="Enter your Name Here">
            <input type="email" name="email" placeholder="Enter Email Here">
            <input type="password" name="password" placeholder="Enter Password Here">
            <input type="password" name="cpass" placeholder="Confirm your Password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <button name="submit" class="btnn"><a href="#">Sign up</a></button>

            <p class="link">Already have an account?<br>
            <a href="login.php">Login</a> here</p>
            <p class="liw">Sign up in with</p>

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