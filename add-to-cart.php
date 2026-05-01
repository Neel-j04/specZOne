<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <div class="container">
        <div class="navbar-top">
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
    <!-- Navbar End -->

    <!-- Cart Section -->
    <div class="container mt-5">
        <h2>Your Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Custom Menus</td>
                    <td>1</td>
                    <td>Rs.1,199</td>
                    <td>Rs.1,199</td>
                </tr>
            </tbody>
        </table>

        <!-- Proceed to Checkout Button -->
        <div class="text-right">
            <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <h1 class="text-center">specZone</h1>
        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ab?</p>
        <div class="copyright text-center">
            &copy; Copyright <strong><span>specZone</span></strong>. All Rights Reserved
        </div>
    </footer>
    <!-- Footer End -->
</body>
</html>
