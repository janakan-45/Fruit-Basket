<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: loginPage.html");
    exit();
}

require 'db_connection.php';

$user_id = $_SESSION['user_id'];
$bank_name = $conn->real_escape_string($_POST['name']);
$card_number = $conn->real_escape_string($_POST['card_number']);
$pin_number = $conn->real_escape_string($_POST['pin_number']);

$sql = "INSERT INTO payment_details (user_id, bank_name, card_number, pin_number) VALUES ('$user_id', '$bank_name', '$card_number', '$pin_number')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Payment details added successfully. Your order is added.');
            window.location.href='home.php';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
