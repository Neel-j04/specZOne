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

// Handle adding products to the session cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];

    // Initialize session cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if product already exists in cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $product_id) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }

    // If product is not in the cart, add it
    if (!$found) {
        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'product_name' => $product_name,
            'price' => $price,
            'quantity' => 1
        ];
    }

    // Redirect to cart page
    header('Location: cart.php');
    exit();
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>specZone - Home</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

            /* Position cart count in the top right corner of the cart icon */
            .header .cart
            {
                position: relative;
                font-size: 24px;
                color: #fff;
            }

            .header .cart .cart-count
            {
                position: absolute;
                top: -12px;
                Move the cart count slightly higher
                right: -10px;
                Adjust horizontally
                background-color: #e74c3c;
                color: #fff;
                border-radius: 50%;
                padding: 4px 8px;
                font-size: 12px;
                font-weight: bold;
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
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0);
                max-width: 400px;
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
                    width: calc(25% - 20px); /* Four products per row with gap */
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
                /* Display five products per row */
                .products-container {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 20px;
                    justify-content: center;
                }

                .product {
                    width: calc(20% - 20px); /* Five products per row with gap */
                    max-width: 220px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    transition: transform 0.2s ease;
                }

                .product img {
                    width: 100%;
                    height: 150px;
                    border-top-left-radius: 8px;
                    border-top-right-radius: 8px;
                    object-fit: cover;
                }

                @media (max-width: 992px) {
                    .product {
                        width: calc(33.33% - 20px); /* Three products per row on tablets */
                    }
                }

                @media (max-width: 768px) {
                    .product {
                        width: calc(50% - 20px); /* Two products per row on mobile */
                    }
                }

                @media (max-width: 576px) {
                    .product {
                        width: 100%; /* One product per row on very small screens */
                    }
                }

            }
        </style>
        <script>
            //     For profile
            function toggleProfile() {
                var profileContainer = document.querySelector('.profile-container');
                profileContainer.classList.toggle('active');
            }
            function enableField() {
                document.getElementById('name').disabled = false;
                document.getElementById('email').disabled = false;
//                document.getElementById('phone').disabled = false;
//                document.getElementById('address').disabled = false;
//                document.getElementById('pincode').disabled = false;
//                document.getElementById('state').disabled = false;
//                document.getElementById('city').disabled = false;
            }
            function openModal() {
                document.getElementById("passwordModal").style.display = "flex"; // Show the modal
            }
        </script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="www.css">
    </head>
    <body>
        <div class="profile-container">
            <div class="profile-header">
                <?php
                $name = $_SESSION['name'];
                $email = $_SESSION['email'];

                $Q = "Select * from tbl_user where Email = '$email'";
                $r = mysqli_query($conn, $Q);
                while ($re = mysqli_fetch_row($r)) {
//                    ID`, `Name`, `Email`, `Phone_No.`, `Gender`, `Date_of_Birth`, `Password`, `Address`, `State`, `City`, `Pincode`, `Roll`, `Joining_Date`
                    $id = $re[0];
                    $name = $re[1];
                    $email = $re[2];
                    $phoneno = $re[3];
                    $date = $re[5];
                    $address = $re[7];
                    $state = $re[8];
                    $city = $re[9];
                    $pincode = $re[10];
                }



                if (isset($_POST['save'])) {
                    $cid = $id;
                    $cname = isset($_POST['name']) ? $_POST['name'] : $name;
                    $cemail = isset($_POST['email']) ? $_POST['email'] : $email;
                    $cphone = isset($_POST['phone']) ? $_POST['phone'] : $phoneno;
                    $caddress = isset($_POST['address']) ? $_POST['address'] : $address;
                    $cstate = isset($_POST['state']) ? $_POST['state'] : $state;
                    $ccity = isset($_POST['city']) ? $_POST['city'] : $city;
                    $cpincode = isset($_POST['pincode']) ? $_POST['pincode'] : $pincode;

                    // Update Customer details
//                    $update = "UPDATE tbl_user SET Name='$cname', Email='$cemail', Phone_No.`=$cphone, Address='$caddress', State='$cstate', City='$ccity', Pincode='$cpincode' WHERE ID=$id";
                    $update = "UPDATE tbl_user SET Name='$cname', Email='$cemail' WHERE ID=$id";
                    $res = mysqli_query($conn, $update);

                    if ($res) {
                        echo "<script>alert('Profile Updated Successfully');</script>";
                    } else {
                        echo "<script>alert('Profile Update Failed');</script>";
                    }

                    // Redirect after the update
                    header("location:" . $_SERVER['PHP_SELF']);
                    mysqli_close($conn);
                    exit();
                }
                ?>

                <p>Welcome, <?php echo $name; ?>!</p>
                <button class="close-btn" onclick="toggleProfile()">Close</button>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php
                    if (isset($name)) {
                        echo $name;
                    }
                    ?>" 
                           disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php
                    if (isset($email)) {
                        echo $email;
                    }
                    ?>" disabled>
                </div>
<!--                <div class="form-group">
                    <label for="phone">Mobile</label>
                    <input type="number" id="phone" name="phone" value="<?php
                    if (isset($phoneno)) {
                        echo $phoneno;
                    }
                    ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="addtype1">Address</label>
                    <input type="text" id="address" name="address" value="<?php
                    if (isset($address)) {
                        echo $address;
                    }
                    ?>" disabled>           
                </div>
                <div class="form-group">
                    <label for="pincode1">Pincode</label>
                    <input type="text" id="pincode" name="pincode" value="<?php
                    if (isset($pincode)) {
                        echo $pincode;
                    }
                    ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="phone">State</label>
                    <input type="text" id="state" name="state" value="<?php
                    if (isset($state)) {
                        echo $state;
                    }
                    ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">City</label>
                    <input type="text" id="city" name="city" value="<?php
                    if (isset($city)) {
                        echo $city;
                    }
                    ?>" disabled>
                </div>-->

                <div class="form-group">
                    <a href="javascript:void(0);" class="change-password" onclick="openModal()">Change Password</a>

                    <div id="passwordModal" style="display: none;">
                        <div style="border: 1px solid #888; padding: 20px; width: 300px; margin: 20px auto; background: #fff;">
                            <h2>Change Password</h2>
                            <label for="oldPassword">Old Password</label>
                            <input type="password" name="old" id="oldPassword"><br><br>

                            <label for="newPassword">New Password</label>
                            <input type="password" name="new" id="newPassword"><br><br>

                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirm" id="confirmPassword"><br><br>

                            <button name="submitprofile" onclick="submitPassword()">Submit</button>
                            <button onclick="closeModal()">Cancel</button>

                        </div>
                    </div>
                </div>
                <button type="button" onclick="enableField()">Edit</button>
                <button type="submit" name="save">Save</button>
                <button type="submit" name="logout">logout</button>
                <button type="submit" name="previous_order">Previous Orders</button>
            </form>
        </div>
    <center>
        <div class="">
            <h1>specZone</h1>
        </div>

    </center>
    <hr>
    <div class="navbar-top">


        <div class="search-bar">
            <input type="text" placeholder="Search products..." name="search" id="search">
        </div>
        <div class="icons">

            <i><img src="./image/heart.png" alt="" width="20px"></i>
            <a href="cart.php" class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count"><?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?></span>
            </a>
            <i><a href="#" onclick="toggleProfile()"><img src="./image/profile.png" alt="" width="50px"><?php echo 'Profile' ?></a></i>
        </div>
    </div>

    <!-- main content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-md" id="navbar-color">
            <div class="container">
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">G.O.A.T</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Accessories</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Brands</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="vit.html">Virtual Try On</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!--    <header class="header">
            
            
            
            <a href="Home.php" class="logo">specZone</a>
            <a href="cart.php" class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count"><?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?></span>
            </a>
        </header>-->

    <div class="content">
        <h3 class="text-center">SERVICES WE OFFER</h3>
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
                        <form method="post" action="Home.php">
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
        </div>
    </div>

    <footer id="footer">
        <h1>specZone</h1>
        <div class="icons">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-google"></i></a>
            <a href="#"><i class="fab fa-skype"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="copyright">&copy; Copyright <strong><span>specZone</span></strong>. All Rights Reserved</div>
        <div class="credite">Designed By <a href="#">specZone Coding</a></div>
    </footer>
</body>
</html>