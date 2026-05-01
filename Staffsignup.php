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
                margin: 10px 10px 60px 40px;
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
        session_start();
        if (isset($_POST['regitration'])) {

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "speczone";

            $em = $_POST['email'];

            $con = mysqli_connect($servername, $username, $password, $dbname);

            $q1 = "select ID from tbl_User where Email='$em'";

            $res = mysqli_query($con, $q1);

            while ($r = mysqli_fetch_row($res)) {

                $ID = $r[0];
            }
            if (!isset($ID)) {
                require 'smtp.php';

// Settings
                $mail->IsSMTP();
                $mail->CharSet = 'UTF-8';

                $mail->Host = "smtp.gmail.com";    // SMTP server example
                $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
                $mail->SMTPAuth = true;                  // enable SMTP authentication
                $mail->Port = 587;                    // set the SMTP port for the GMAIL server
                $mail->Username = "speczone888@gmail.com";            // SMTP account username example
                $mail->Password = "aezkgdzmrolqwvls";            // SMTP account password example
// Content
                $mail->setFrom('speczone888@gmail.com');
                $mail->addAddress($em);
                $otp = random_int(10000, 99999);
                $mail->isHTML(true);                       // Set email format to HTML
                $mail->Subject = 'OTP for Login';
                $mail->Body = '<html><head><title></title></head><body>' . $otp . '</body></html>';
                $mail->AltBody = 'The login otp is for clients registering on system';

                $_SESSION['sotp'] = $otp;

                if ($mail->send()) {
                    $pass = $_POST['passkey'];
                    $enc = password_hash($pass, PASSWORD_DEFAULT);
                    $_SESSION["name"] = $_POST["name"];
                    $_SESSION["email"] = $_POST["email"];
                    $_SESSION["passkey"] = $enc;
                    $roll = $_POST['roll'];
                    $_SESSION["roll"] = $roll;
                    if ($roll1 == 'Admin') {
                        header('Location: Admin.php');
                    } else if ($roll1 == 'Delivery_Person') {
                        header("Location: Dilivery.php");
                    }
                } else {

                    echo "<script> alert('INVALID EMAILID'); </script>";
                }
            } else {
                echo "<script>alert('This user is alrady exist');</script>";
            }
        }
        ?>        
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
                    <i><img src="./image/search.png" alt="" width="20px"></i>
                    <i><img src="./image/heart.png" alt="" width="20px"></i>
                    <i><img src="./image/shopping-cart.png" alt="" width="25px"></i>
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
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Top Chair</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Chair</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Brands</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>
                </div>
            </div> 
        </nav>
    <center>
        <div class="content">
            <form method="post" action="">
                <h1 id="reg-1">SIGN UP</h1>

                <div class="form-group">
                    <label for="fname">Name</label>
                    <input class='input'type="text" id="name" pattern="[A-Z or a-z]{2,15}" name="name" placeholder="Name" class="box" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class='input' type="email" id="email" name="email" placeholder="Email" class="box" required>
                </div>

                <div class="form-group">
                    <label for="passkey1">Password</label>
                    <input class='input' type="password" id="passkey1" pattern="{8,}" name="passkey" placeholder="Password" class="box" required>
                </div>

                <div class="form-group">
                    <label for="passkey2">Confirm Password</label>
                    <input class='input' type="password" id="passkey2" pattern="{8,}" name="passkey-c" placeholder="Confirm Password" class="box" required>
                </div>
                <div class="form-group">
                 <label for="roll">Category</label>
                    <select class="input" class="Box" name='roll'>
                        <option value="Admin">
                            Admin
                        </option>
                        <option value="Delivery_Person">
                            Delivery Person
                        </option>
                    </select>
                  </div>
                
                <input type="submit" name="regitration" class="reg-btn" value="Register">
            </form>
        </div>

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