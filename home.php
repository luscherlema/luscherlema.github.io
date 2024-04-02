<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['name'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LeIm Tech Innovation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="LTI-v.jpg">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h1 class="logo">LeimTech</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICE</a></li>
                    <li><a href="#">DESIGN</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>

            <div class="search">
                <input type="search"  class="srch" name="" placeholder="Type to text">
                <a href="#"> <button class="btn">Search</button></a>
            </div>
        </div>

        <div class="content">
            <h1>Hello, <span><?php echo $_SESSION['name'] ?></span></h1>
            <h1>Web Design & <br><span>Development</span> <br>Course</h1>
            <p class="par">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore reiciendis excepturi <br> provident impedit fuga ratione alias officiis tenetur nemo, rem delectus vitae <br> molestiae animi quia ipsa. Sed ipsum quaerat unde?</p>

            <button class="cn"><a href="#">JOIN US</a></button>


        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>