<?php session_start();?><!DOCTYPE html>
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
                 justify-content: center;
                 background-position: center;
                  align-items: center;
            }

            .content {
                display: inline-block;
                border: 2px solid black;
                border-radius: 7px;
                box-shadow: -2px 2px 25px rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(25px);
                padding: 20px;
                margin-top: 60px;
                margin-bottom: 60px;
                background: rgba(255, 255, 255, 0.8); /* Adjust opacity as needed */
                width: 100%;
                max-width: 500px; /* Adjust maximum width as needed */
            }
            label{
                margin-right: 250px;
                padding-right: 30px;
            }
            h1 {
                font-size: 30px;
                margin: 0 30px 20px;
            }

            .input {
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
  .otpbtn {
                height: 40px;
                width: 20%;

                background: transparent;
                color: black;
                font-size: 18px;
                margin-bottom: 20px;
                margin-top: 0px;
                margin-left: 350px;
                cursor: pointer;
                transition: background 0.3s ease;
            }
            
            
            .reotpbtn{
                height: 40px;
                width: 30%;

                background: transparent;
                color: black;
                font-size: 18px;
                margin-bottom: 0px; /* Adjust margin as needed */
                margin-top: 20px;
                margin-left: 0px;
                cursor: pointer;
                transition: background 0.3s ease;
            }
            
            
            input::placeholder {
                color: black;
                font-size: 16px;
                font-weight: 500;
            }

            .reg-btn {
                height: 40px;
                width: calc(100% - 80px);
                border: 1.5px solid black;
                border-radius: 6px;
                background: transparent;
                color: black;
                font-size: 18px;
                margin: 50px 50px 60px 40px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .reg-btn:hover {
                background: rgba(238,224,208);
            }

            .register-asker {
                position: relative;
                top: 110px;
                color: black;
            }

            footer {
                text-align: center;
                margin-top: 30px;
                padding: 20px 0;
            }
        </style>

        <?php

      if (isset($_POST['Verify'])) {

            $a = $_POST['otp'];
            if (isset($_SESSION['sotp']) && $a == $_SESSION['sotp']) {
                header("location: AdminDitails.php");
            } else {
                echo "<script>alert('Invalid OTP ,please enter valid OTP');</script>";
            }
        }
        if (isset($_POST["resendotp"])) {
           
            $a = $_SESSION['semail'];
            $otp = random_int(10000, 99999);
            $_SESSION['otp'] = $otp;

            $to_email = $a;
            $subject = "OTP VERIFICATION";
            $body = "Your otp is $otp";
            $headers = "From: speczone001@gmail.com";

            if (mail($to_email, $subject, $body, $headers)) {
                //echo "success";
            } else {
                //echo "Email sending failed...";
            }
        }
        ?>        
    </head>
    <body>
        <div class="container">
            <div class="navbar-top">
                <div class="social-link">
<!--                    <i><img src="./image/twitter.png" alt="" width="30px"></i>
                    <i><img src="./image/facebook.png" alt="" width="30px"></i>
                    <i><img src="./image/google-plus.png" alt="" width="30px"></i>-->
                </div>
                <div class="logo">
                    <h3>specZone</h3>
                </div>
                <div class="icons">
<!--                    <i><img src="./image/search.png" alt="" width="20px"></i>
                    <i><img src="./image/heart.png" alt="" width="20px"></i>
                    <i><img src="./image/shopping-cart.png" alt="" width="25px"></i>-->
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
<!--                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Top Chair</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Chair</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Brands</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>-->
                    </ul>
                </div>
            </div> 
        </nav><center>
        <div class="content">
            
            <form method="POST">
                <div class="form-group">
                    <input type="number" max="6" class="input" name="otp" id="txtotp" placeholder = "Enter the otp....">
                </div><br>
                <div class="reotpbtn">
                    <input type="submit" id="btnotp" name="Verify" value="Verify">
                </div>
                <div class="otpbtn">
                    <input type="submit" id="btnreotp" name="resendotp"  value="Resend OTP">
                </div>
            </form>     
            
        </div>
    </center>
        <footer id="footer">
            <h1>Furniture</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab?</p>
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