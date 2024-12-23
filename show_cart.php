<?php
session_start();
if (isset($_POST['delete'])) {
    $key = $_POST['key'];
    unset($_SESSION['cart'][$key]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); 
    header("Location: show_cart.php"); 
    exit;
}

if (isset($_POST['increase'])) {
    $key = $_POST['key'];
    $_SESSION['cart'][$key]['quantity']++;
    header("Location: show_cart.php");
    exit;
}

if (isset($_POST['decrease'])) {
    $key = $_POST['key'];
    
    
    if ($_SESSION['cart'][$key]['quantity'] > 0) {
        $_SESSION['cart'][$key]['quantity']--;
    }
    
    header("Location: show_cart.php");
    exit;
}


if (isset($_POST['buy_now'])) {
    header("Location: checkout.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="css/products.css">
    <link rel="stylesheet" type="text/css" href="css/show_cart.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="images/logo.jpg" class="img-re">
        </div>
        <ul class="menu">
            <li><a href="home.php">BACK</a></li>
            <li><a href="terms.html">TERMS</a></li>
            <li><a href="contact.html">CONTACT</a></li>
            <li>
                <div class="icon-cart">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                    </svg>
                </div>
            </li>
        </ul>
        <div class="search">
            <form>
                <input type="text" id="search" placeholder="search">
            </form>
        </div>
    </nav>
    <h1>Your Cart</h1>
    <div class="cart-items">
        <?php if (!empty($_SESSION['cart'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $key => $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td>$<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="key" value="<?php echo $key; ?>">
                                    <button type="submit" name="delete">Delete</button>
                                    <button type="submit" name="increase">Increase Quantity</button>
                                    <button type="submit" name="decrease">Decrease Quantity</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form method="post" action="">
                <button type="submit" name="buy_now">Buy Now</button>
            </form>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
    <footer>
        <table>
            <tr>
                <td>
                    <p>&copy; 2024 First Pages All rights reserved</p>
                </td>
                <td>
                    <a href="terms.html">Team Of Services</a>
                    <div class="vr"></div>
                    <a href="contact.html">Contact Us</a>
                </td>
            </tr>
        </table>
    </footer>
</body>
</html>
