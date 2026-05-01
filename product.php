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
        main {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .product-details {
            display: flex;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background: #f9f9f9;
        }

        .product-image {
            max-width: 320px;
            max-height: 320px;
            margin-right: 40px;
            border-radius: 8px;
            cursor: pointer; /* Change cursor to pointer */
        }

        .product-info {
            flex: 1;
        }

        h2 {
            color: #333;
            margin-bottom: 15px;
        }

        .description {
            margin: 10px 0;
        }

        h3 {
            margin-top: 20px;
            color: #444;
        }

        ul {
            list-style-type: disc;
            margin-left: 20px;
            margin-bottom: 15px;
        }

        .add-to-cart {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart:hover {
            background-color: #0056b3;
        }

        .customer-reviews,
        .related-products,
        .faq {
            border-top: 1px solid #ddd;
            padding-top: 15px;
            margin-top: 20px;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px 0;
        }

        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .image-gallery img {
            max-width: 100px;
            margin-right: 10px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .color-option {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
            cursor: pointer;
            border: 2px solid #ddd;
        }
    </style>
    <script>
        function changeMainImage(src) {
            document.getElementById('mainProductImage').src = src;
        }

        function selectColor(color) {
            console.log("Selected color:", color);
        }

        function openFullScreen() {
            const img = document.getElementById('mainProductImage');
            if (img.requestFullscreen) {
                img.requestFullscreen();
            } else if (img.webkitRequestFullscreen) { // Safari
                img.webkitRequestFullscreen();
            } else if (img.msRequestFullscreen) { // IE11
                img.msRequestFullscreen();
            }
        }
    </script>
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
                <i><img src="./image/shopping-cart.png" alt="" width="25px" data-toggle="modal" data-target="#cartModal"></i>
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

    <main>
        <section class="product-details">
            <div>
                <img id="mainProductImage" src="Specs/DSC4394_360x.jpg" alt="Product Image" class="product-image" onclick="openFullScreen()">
                <div class="image-gallery">
                    <img src="Specs/DSC4307_360x.jpg" alt="Product Image 1" onclick="changeMainImage(this.src)">
                    <img src="Specs/DSC4308_1_400x.jpg" alt="Product Image 2" onclick="changeMainImage(this.src)">
                    <img src="Specs/DSC4309_800x.jpg" alt="Product Image 3" onclick="changeMainImage(this.src)">
                </div>
            </div>
            <div class="product-info">
                <h2>Price: $300.20</h2>
                <p class="description">
                    Sleek and stylish, these black metallic glasses combine durability with a modern design. Perfect for any occasion, they offer a comfortable fit and a bold look that enhances your eyewear collection. 
                </p>

                <h3>Color Options:</h3>
                <div>
                    <div class="color-option" style="background-color: red;" onclick="selectColor('red')"></div>
                    <div class="color-option" style="background-color: blue;" onclick="selectColor('blue')"></div>
                    <div class="color-option" style="background-color: green;" onclick="selectColor('green')"></div>
                    <div class="color-option" style="background-color: black;" onclick="selectColor('black')"></div>
                </div>

                <h3>Key Features:</h3>
                <ul>
                    <li>Durable Construction: Made with high-quality metallic materials for long-lasting wear.</li>
                </ul>
                <h3>Specifications:</h3>
                <ul>
                    <li>Dimensions: 54-20-14</li>
                    <li>Weight: 150 lbs</li>
                    <li>Material: Metal</li>
                    <li>Color Options: 4</li>
                </ul>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </section>

        <section class="customer-reviews">
            <h3>Customer Reviews:</h3>
            <div class="review">
                <p>⭐️⭐️⭐️⭐️⭐️ (4.8/5 based on 150 reviews)</p>
                <p>"Amazing product! Highly recommend." – Neel</p>
                <p>"Great quality and fast shipping." – Jeet</p>
                <p>"The price is not justified." – Ritik</p>
                <p>"Good product, but the delivery time is too long." – Om</p>
            </div>
        </section>

        <section class="related-products">
            <h3>Related Products:</h3>
            <ul>
                <li>Product 1</li>
                <li>Product 2</li>
                <li>Product 3</li>
            </ul>
        </section>

        <section class="faq">
            <h3>FAQ:</h3>
            <ul>
                <li><strong>Question 1:</strong> Answer.</li>
                <li><strong>Question 2:</strong> Answer.</li>
                <li><strong>Question 3:</strong> Answer.</li>
            </ul>
        </section>
    </main>

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

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Your cart is currently empty.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Checkout</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
