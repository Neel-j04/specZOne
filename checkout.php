<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Checkout Form -->
    <div class="container mt-5">
        <h2>Checkout</h2>
        <form>
            <!-- Personal Information -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" pattern="[A-Z or a-z]{2,15}" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>

            <!-- Shipping Address -->
            <h4>Shipping Address</h4>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter your address" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="Enter your city" required>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" placeholder="Enter your state" required>
            </div>
            <div class="form-group">
                <label for="zip">Zip Code</label>
                <input type="text" class="form-control" id="zip" placeholder="Enter your zip code" required>
            </div>

            <!-- Payment Information -->
            <h4>Payment Information</h4>
            <div class="form-group">
                <label for="card">Credit Card Number</label>
                <input type="text" class="form-control" id="card" placeholder="Enter your credit card number" required>
            </div>
            <div class="form-group">
                <label for="expiry">Expiry Date</label>
                <input type="text" class="form-control" id="expiry" placeholder="MM/YY" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" placeholder="CVV" required>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit Payment</button>
            </div>
        </form>
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
