<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Payment Page</title>
        <style>
        /* General page styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container styling */
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        /* Heading (H1) styling */
        h1 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Image styling */
        img {
            max-width: 120px;
            margin-bottom: 20px;
        }

        /* Razorpay button styling */
        button.razorpay-payment-button {
            background-color: #F37254;
            color: #fff;
            font-size: 18px;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        /* Hover effect on Razorpay button */
        button.razorpay-payment-button:hover {
            background-color: #d65d43;
        }

        /* Form styling */
        form {
            margin: 0 auto;
        }

        /* Hidden input field styling (optional) */
        input[type="hidden"] {
            display: none;
        }

        /* Adding some padding to the top of the body to center the container */
        body {
            padding: 20px;
        }

        </style>
    </head>
    <body>
       <div class="container">
            <h1>Complete Your Payment</h1>
            <img src="om.png" alt="Speczone Logo">

            <?php
                session_start();
                $API = 'rzp_test_RcQ1BlRnKG4USc';
                $amount = $_SESSION['total_amount']*100;
                $oid = 'OID'.rand(10,20);
            ?>
            
            <form action="success.php" method="POST">
                <script
                    src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="<?php echo "$API";?>" 
                    data-amount="<?php echo "$amount";?>" 
                    data-currency="INR"
                    data-id="<?php echo "$oid";?>"
                    data-buttontext="Pay with Razorpay"
                    data-name="Speczone"
                    data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
                    data-image="1.png"
                    data-theme.color="#F37254"
                ></script>
                <input type="hidden" custom="Hidden Element" name="hidden">
            </form>
        </div>
    </body>
</html>
