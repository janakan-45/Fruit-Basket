<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: loginPage.html");
    exit();
}

$user_id = $_SESSION['user_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM payment_details WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: paynmentdetails.html");
    exit();
}



echo "<script>alert('Your order is added.'); window.location.href='2ndtime.php';</script>";

$conn->close();
?>
