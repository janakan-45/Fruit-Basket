
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Basket - Home</title>
    <link rel="icon" href="images/icon.jpg" type="image/jpg" />
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
 
<nav>
        <ul class="menu">
            <div class="logo">
                <img src="images/logo.jpg" class="img-re">
            </div>
            <li><a href="home.php">HOME</a></li>
            <li><a href="2ndtime.php">PRODUCTS </a></li>
            <li><a href="contact.html">CONTACT </a></li>
            <li><a href="terms.html">TERMS </a></li>
            <?php if(isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php">LOGOUT</a></li>
            <?php else: ?>
                <li><a href="loginpage.html">LOGIN</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <h1 id="h1">FRESH BASKET</h1>

    <div class="main">
        <div class="content">
            <h2>Welcome to Fresh Basket</h2>
            <p>Buy your favourite fruits here!</p>
        </div>
    </div>

    <br>
    <br>

    <img src="images/fr.jpg" id="img">
    <br>
    <br>

    <div id="s">
    <img src="images/fs.jpg" id="img2">
    <p>Handpicked and delivered fresh, just for you!</p>
</div>
<br>

<h4  id="x">Boost your health with our nutrient-rich, wholesome fruits 😍</h4>
<br>
<div class="div">
<div class="section">
    <h2 id="h23">About Us</h2>
    <br>
   
    <p>Welcome to Fresh Basket, where we bring you the best dining experience with delicious fruits and excellent service.</p>
    Our mission is to provide high-quality fruits picked with high quality equipments sourced locally whenever possible. We believe in creating memorable moments for our customers by offering a diverse menu to cater to various tastes and dietary preferences.
    At Fresh Basket, we value teamwork, innovation, and customer satisfaction. Our dedicated team works tirelessly to ensure every customer leaves with a smile.
</div>
</div>
<br>
<br>
    

    <div class="images">
        <marquee direction="right">
            <img src="images/home.gif">
        </marquee>
    </div>
</div>


    <footer>
        <table>
            <tr>
                <td>
                    <p>&copy; 2024 First Pages All rights reserved </p>
                </td>
                <td>
                    <a href="terms.html">Terms of Service</a>
                    <div class="vr"></div>
                    <a href="contact.html">Contact Us</a>
                </td>
            </tr>
        </table>
    </footer>
</body>
</html>
