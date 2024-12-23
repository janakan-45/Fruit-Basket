c<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $email = $conn->real_escape_string($_POST['email']);
    $password_post = $_POST['password'];

    if ($email === "jana@gmail.com" && $password_post === "jana") {
        $_SESSION['admin'] = true;
        header("Location: ../admin_product.php");
        exit();
    } else {
        $sql = "SELECT * FROM logindetails WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password_post, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];

                header("Location: ../home.php");
                exit();
            } else {
                echo "<script>alert('Invalid password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('No user found with that email address.');</script>";
        }
    }

    $conn->close();
}
?>
