<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_product'])) {
      
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $description = $_POST['description'];

        $sql = "INSERT INTO products (id, name, price, image, description) VALUES ('$id', '$name', '$price', '$image', '$description')";
        if ($conn->query($sql) === TRUE) {
            echo "New product created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['update_product'])) {
        
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $description = $_POST['description'];

        $sql = "UPDATE products SET name='$name', price='$price', image='$image', description='$description' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Product updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['delete_product'])) {
       
        $id = $_POST['id'];

        $sql = "DELETE FROM products WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Product deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
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
    <link rel="stylesheet" type="text/css" href="css/admin_products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    <div style="text-align: center;">
  <button id="addProductBtn">Add Product</button>
</div>

    
    <div id="addProductModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="post" action="">
                <input type="hidden" name="id" placeholder="Product ID" required>
                <input type="text" name="name" placeholder="Product Name" required>
                <input type="text" name="price" placeholder="Product Price" required>
                <input type="text" name="image" placeholder="Product Image URL" required>
                <textarea name="description" placeholder="Product Description" required></textarea>
                <button type="submit" name="add_product">Add Product</button>
            </form>
        </div>
    </div>

   
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form method="post" action="">
                <input type="hidden" name="id" id="modal_product_id">
                <input type="text" name="name" id="modal_product_name" placeholder="Product Name" required>
                <input type="text" name="price" id="modal_product_price" placeholder="Product Price" required>
                <input type="text" name="image" id="modal_product_image" placeholder="Product Image URL" required>
                <textarea name="description" id="modal_product_description" placeholder="Product Description" required></textarea>
                <button type="submit" name="update_product">Update Product</button>
            </form>
        </div>
    </div>

    <div class="grid" id="products">
        <?php
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                echo '<div class="grid-item">';
                echo '    <div class="item">';
                echo '        <div class="image-container">';
                echo '            <img class="image" src="' . $row["image"] . '" alt="' . $row["name"] . '">';
                echo '            <div class="overlay">';
                echo '                <button class="edit-product" data-id="' . $row["id"] . '" data-name="' . $row["name"] . '" data-price="' . $row["price"] . '" data-image="' . $row["image"] . '" data-description="' . $row["description"] . '"><i class="fas fa-edit"></i></button>';
                echo '                <form method="post" action="" class="delete-form">';
                echo '                    <input type="hidden" name="id" value="' . $row["id"] . '">';
                echo '                    <button type="submit" name="delete_product"><i class="fas fa-trash-alt"></i></button>';
                echo '                </form>';
                echo '            </div>';
                echo '        </div>';
                echo '        <div class="details">';
                echo '            <h3 class="title">' . $row["name"] . '</h3>';
                echo '            <p class="description">' . $row["description"] . '</p>';
                echo '            <p class="price">1kg->$' . number_format($row["price"], 2) . '</p>';
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
        // Functionality for Add Product modal
        const addProductBtn = document.getElementById('addProductBtn');
        const addProductModal = document.getElementById('addProductModal');
        const closeAddModal = addProductModal.querySelector('.close');

        addProductBtn.addEventListener('click', () => {
            addProductModal.style.display = 'block';
        });
        //Close Edit modal when clicking
        closeAddModal.addEventListener('click', () => {
            addProductModal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === addProductModal) {
                addProductModal.style.display = 'none';
            }
        });

        // Functionality for Edit Product modal
        document.querySelectorAll('.edit-product').forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');
                const productImage = this.getAttribute('data-image');
                const productDescription = this.getAttribute('data-description');

                document.getElementById('modal_product_id').value = productId;
                document.getElementById('modal_product_name').value = productName;
                document.getElementById('modal_product_price').value = productPrice;
                document.getElementById('modal_product_image').value = productImage;
                document.getElementById('modal_product_description').value = productDescription;

                // Display modal
                document.getElementById('editModal').style.display = 'block';
            });
        });

      
        document.querySelector('.modal .close').addEventListener('click', function() {
            document.getElementById('editModal').style.display = 'none';
        });

        
        window.addEventListener('click', function(event) {
            if (event.target === document.getElementById('editModal')) {
                document.getElementById('editModal').style.display = 'none';
            }
        });
    </script>
</body>
</html>
