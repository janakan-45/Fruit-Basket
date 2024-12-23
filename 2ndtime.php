<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, name, price, image, description FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Basket</title>
    <link rel="icon" href="images/icon.jpg" type="image/jpg" />
    <link rel="stylesheet" type="text/css" href="css/products.css">
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
                    <a href="show_cart.php">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                        </svg>
                    </a>
                </div>
            </li>
        </ul>
        <div class="search">
            <form>
                <input type="text" id="search" placeholder="search">
            </form>
        </div>
    </nav>
    <h1 id="h1"> FRESH BASKET</h1>
    <br><br>
    <div class="grid" id="products">
        <?php
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                echo '<div class="grid-item">';
                echo '    <div class="item">';
                echo '        <img class="image" src="' . $row["image"] . '" alt="' . $row["name"] . '">';
                echo '        <div class="details">';
                echo '            <h3 class="title">' . $row["name"] . '</h3>';
                echo '            <p class="description">' . $row["description"] . '</p>';
                echo '            <p class="price">1kg->$' . number_format($row["price"], 2) . '</p>';
                echo '            <button class="add-to-cart" data-id="' . $row["id"] . '" data-name="' . $row["name"] . '" data-price="' . $row["price"] . '">Add To Cart</button>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
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
    <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');

                fetch('cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `product_id=${productId}&product_name=${productName}&product_price=${productPrice}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('Product added to cart');
                    } else {
                        alert('Error adding product to cart');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>
</html>
