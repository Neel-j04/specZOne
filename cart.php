<?php
session_start();

$total_amount = 0;

if (isset($_GET['remove'])) {
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $_GET['remove']) {
            unset($_SESSION['cart'][$key]);
        }
    }
    header('Location: cart.php');
    exit();
}

if (isset($_GET['increment']) || isset($_GET['decrement'])) {
    $id = isset($_GET['increment']) ? $_GET['increment'] : $_GET['decrement'];
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $id) {
            $item['quantity'] += isset($_GET['increment']) ? 1 : -1;
            if ($item['quantity'] < 1) $item['quantity'] = 1;
        }
    }
    header('Location: cart.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
</head>
<body>

<h1>Your Shopping Cart</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                $total_amount += $subtotal;
                $_SESSION['total_amount'] = $total_amount;
                
                echo '
                <tr>
                    <td>' . $item['product_name'] . '</td>
                    <td>₹' . $item['price'] . '</td>
                    <td>
                        <a href="cart.php?decrement=' . $item['product_id'] . '"><button>-</button></a>
                        ' . $item['quantity'] . '
                        <a href="cart.php?increment=' . $item['product_id'] . '"><button>+</button></a>
                    </td>
                    <td>₹' . number_format($subtotal, 2) . '</td>
                    <td>
                        <a href="cart.php?remove=' . $item['product_id'] . '"><button>Remove</button></a>
                    </td>
                </tr>';
            }
        } else {
            echo '<tr><td colspan="5">Your cart is empty!</td></tr>';
        }
        ?>
    </tbody>
</table>

<h2>Total: ₹<?php echo number_format($total_amount, 2); ?></h2>

<a href="Home.php"><button>Continue Shopping</button></a>
<a href="payment.php"><button>Proceed to Checkout</button></a>

</body>
</html>
