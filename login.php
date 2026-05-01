<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>specZone</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: Arial, sans-serif;
            }

            .content {
                display: inline-block;
                border: 2px solid black;
                border-radius: 7px;
                box-shadow: -2px 2px 25px rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(25px);
                padding: 20px;
                margin-top: 60px;
                margin-bottom: 80px;
                background: rgba(255, 255, 255, 0.8); /* Adjust opacity as needed */
                /*height: 500px;*/
                height: 400px;
                width: 100%;
                max-width: 500px; /* Adjust maximum width as needed */
            }

            h1 {
                font-size: 30px;
                margin: 0 30px 20px;
            }

            input {
                height: 45px;
                width: calc(100% - 80px);
                padding: 0 10px;
                margin: 0 20px 10px 40px;
                outline: none;
                border: 1.5px solid black;
                border-radius: 6px;
                background: transparent;
                color: black;
                font-size: 16px;
            }

            input::placeholder {
                color: black;
                font-size: 16px;
                font-weight: 500;
            }

            .btn-log {
                height: 45px;
                width: calc(100% - 80px);
                padding: 0 10px;
                margin: 0 20px 10px 40px;
                outline: none;
                border: 1.5px solid black;
                border-radius: 6px;
                background: transparent;
                color: black;
                font-size: 16px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .btn-log:hover {
                background: rgba(238,224,208);
            }

            .register-asker {
                position: relative;
                /*top: 125px;*/
                margin-righ: 50px;
                color: black;
            }

            footer {
                text-align: center;
                margin-top: 30px;
                padding: 20px 0;
            }
        </style>
        <?php
        if (isset($_POST['btn_log'])) {
            $em = $_POST['email'];
            $pa = $_POST['password'];
            $con = mysqli_connect('localhost', 'root', '', 'speczone');

            $q1 = "SELECT Name,Roll,Password FROM tbl_user WHERE Email = '$em'";

            $res = mysqli_query($con, $q1);

            while ($r = mysqli_fetch_row($res)) {
                $name = $r[0];
                $roll = $r[1];
                $pswd = $r[2];
            }

            if (isset($pswd)) {
                if (password_verify($pa, $pswd)) {
                    if ($roll == 'A') {
                        $_SESSION["name"] = $name;
                        $_SESSION["email"] = $_POST["email"];
                        $_SESSION["roll"] = $roll;
                        header("location: Admin_db.php");
                    } elseif ($roll == 'D') {
                        $_SESSION["sname"] = $name;
                        $_SESSION["semail"] = $_POST["email"];
                        $_SESSION["roll"] = $roll;
                        header("location: Deliverydb.php");
                    } elseif ($roll == 'C') {
                        $_SESSION["name"] = $name;
                        $_SESSION["email"] = $_POST["email"];
                        $_SESSION["roll"] = $roll;
                        header("location: Home.php");
                    }
                } else {
                    echo"<script>alert('Wromg Password');</script>";
                }
            } else {
                echo"<script>alert('User Not Exist');</script>";
            }
        }
        ?>
       <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
    </head>
    <body>
        <div class="container">
            <div class="navbar-top">
                <div class="social-link">
                    <i><img src="./image/twitter.png" alt="" width="30px"></i>
                    <i><img src="./image/facebook.png" alt="" width="30px"></i>
                    <i><img src="./image/google-plus.png" alt="" width="30px"></i>
                </div>
                <div class="logo">
                    <h3>specZone</h3>
                </div>
                <div class="icons">

                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-md" id="navbar-color">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span><i><img src="./image/menu.png" alt="" width="30px"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Custom</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Top spec</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Brands</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About US</a></li>
                    </ul>
                </div>
            </div> 
        </nav>
    <center>
        <div class="content">
            <form method="post"> 
                <!--action="validate.php">-->
                <h1>LOGIN</h1>
                <input type="email" placeholder="email" name="email" id="email" required><br><br>
                <input type="password" placeholder="Password" name="password" pattern="{8,}" id="password" required><br><br>
                <!--<div class="g-recaptcha" data-sitekey="6LfCa1EqAAAAAH9jhoNVEdF7Ljzxmls2mFnTBge0"></div><br><br>-->
                <button class="btn-log" name="btn_log">Login</button>
                <a class="register-asker" href="#forget">Forget Password?</a>
                <p class="register-asker">Don't have an account? <a href="register.php">Register</a></p>
            </form>
        </div>
    </center>
    
    <footer id="footer">
        <h1>Specs</h1>
        <p></p>
        <div class="icons">
            <i class="bx bxl-twitter"></i>
            <i class="bx bxl-facebook"></i>
            <i class="bx bxl-google"></i>
            <i class="bx bxl-skype"></i>
            <i class="bx bxl-instagram"></i>
        </div>
        <div class="copyright">&copy; Copyright <strong><span>Furniture</span></strong>. All Rights Reserved</div>
        <div class="credite">Designed By <a href="#">SA Coding</a></div>
    </footer>
</body>
</html>
