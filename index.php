<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
    session_start();

// Database configuration
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'speczone';

// Database connection
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products
$category = isset($_GET['category']) ? $_GET['category'] : '';
$sql = $category ? "SELECT * FROM tbl_productinfo WHERE category = ?" : "SELECT * FROM tbl_productinfo";
$stmt = $conn->prepare($sql);
if ($category) {
    $stmt->bind_param("s", $category);
}
$stmt->execute();
$result = $stmt->get_result();
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>specZone</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styles.css">
        <!-- bootstrap link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- icons -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <!-- icons -->
        <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Header Styles */
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .header .cart {
            position: relative;
            font-size: 24px;
            color: #fff;
        }

        .header .cart .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #e74c3c;
            color: #fff;
            border-radius: 50%;
            padding: 4px 8px;
            font-size: 12px;
        }

        /* Main Content */
        .content {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 15px;
        }

        h3.text-center {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Product Styles */
        .products-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 250px;
            text-align: center;
            transition: transform 0.2s ease;
        }

        .product:hover {
            transform: translateY(-5px);
        }

        .product img {
            width: 100%;
            height: 200px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            object-fit: cover;
        }

        .product h2 {
            font-size: 18px;
            margin: 15px 0 5px;
            color: #333;
        }

        .product p {
            font-size: 14px;
            color: #666;
            margin: 5px 15px;
        }

        .product .price {
            font-size: 18px;
            color: #e74c3c;
            margin: 10px 0;
            font-weight: bold;
        }

        .product form button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-bottom: 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .product form button:hover {
            background-color: #555;
        }

        /* Footer Styles */
        #footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        #footer h1 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        #footer .icons {
            margin: 10px 0;
        }

        #footer .icons i {
            margin: 0 10px;
            font-size: 20px;
            color: #fff;
            transition: color 0.3s;
        }

        #footer .icons i:hover {
            color: #e74c3c;
        }

        #footer .copyright,
        #footer .credite {
            margin-top: 10px;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .products-container {
                gap: 15px;
            }

            .product {
                max-width: 200px;
            }
        }
    </style>
    </head>
    <body>
        <!-- navbar top -->
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
                    <i><a href="login.php"><img src="./image/login.png" alt="" width="50px"></a></i>

                    <b>
                </div>
            </div>
        </div>
        <!-- navbar top -->

        <!-- main content -->
        <div class="main-content">
            <nav class="navbar navbar-expand-md" id="navbar-color">
                <div class="container">
                    <!-- Toggler/collapsibe Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span><i><img src="./image/menu.png" alt="" width="30px"></i></span>
                    </button>

                    <!-- Navbar links -->
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">G.O.A.T</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Accessories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Brands</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="vit.html">Virtual Try On</a>
                            </li>
                        </ul>
                    </div>
                </div> 
            </nav>
        </div>


        <h3 class="text-center" style="padding-top: 30px;">SERVICES WE OFFER</h3>
        <div class="products-container">
            <?php
             if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $image = 'New/' . $row['Image'];
                    echo '
                    <div class="product">
                        <img src="' . $image . '" alt="' . $row['Product_name'] . '">
                        <h2>' . $row['Product_name'] . '</h2>
                        <p>' . $row['Description'] . '</p>
                        <p class="price">₹' . $row['Pirce'] . '</p>
                        <form method="post" action="login.php">
                            <input type="hidden" name="product_id" value="' . $row['Id'] . '">
                            <input type="hidden" name="product_name" value="' . $row['Product_name'] . '">
                            <input type="hidden" name="price" value="' . $row['Pirce'] . '">
                            <button type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                    </div>';
                }
            } else {
                echo '<p>No products available</p>';
            }
            ?>

            <!-- footer -->
            <footer id="footer">
                <h1 class="text-center">specZone</h1>
                <p class="text-center"></p>
                <div class="icons text-center">
                    <a href="https://x.com/?lang=en-in"><i class="bx bxl-twitter"></i></a>
                    <a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a>
                    <a href="https://www.google.co.in/"><i class="bx bxl-google"></i></a>
                    <a href="https://www.skype.com/en/"><i class="bx bxl-skype"></i></a>
                    <a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a>
                </div>
                <div class="copyright text-center">
                    &copy; Copyright <strong><span>specZone</span></strong>. All Rights Reserved
                </div>
                <div class="credite text-center">
                    Designed By <a href="index.php">specZone</a>
                </div>

            </footer>
            <!-- footer -->
            <script>
                window.embeddedChatbotConfig = {
                    chatbotId: "Nbdo4BvEYbwU7VRXrshlL",
                    domain: "www.chatbase.co"
                }
            </script>
            <script
                src="https://www.chatbase.co/embed.min.js"
                chatbotId="Nbdo4BvEYbwU7VRXrshlL"
                domain="www.chatbase.co"
                defer>
            </script>
    </body>
</html>