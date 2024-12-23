<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comments";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['user_email']);
    $comments = $conn->real_escape_string($_POST['comments']);

    $sql = "INSERT INTO comments (email, comment) VALUES ('$email', '$comments')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Your comment is stored.'); window.location.href='contact.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
