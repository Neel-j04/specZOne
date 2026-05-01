<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php include 'header.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
     </head>
    <body>
        <center>
        <div class="content">
            <form method="post">
                <h1 id="reg-1">Forget Password</h1>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="box" required>
                    <i class='bx bxl-gmail' ></i>
                </div>
                <button type="submit" class="reg-btn" name='forgot'>Send OTP</button>
            </form>
        </div>
        </center>
    </body>
</html>
<?php include 'footer.php';?>