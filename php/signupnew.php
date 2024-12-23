1<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if(isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['country'])) {
       
        $firstname = $conn->real_escape_string($_POST['firstname']);
        $lastname = $conn->real_escape_string($_POST['lastname']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $country = $conn->real_escape_string($_POST['country']);

       
        $username = $firstname . ' ' . $lastname;

        
        $email_check_query = "SELECT * FROM logindetails WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($email_check_query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "Email already exists.";
            $stmt->close();
        } else {
            $stmt->close();


            $stmt = $conn->prepare("INSERT INTO logindetails (username, email, password, country) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $password, $country);

            if ($stmt->execute()) {
                header("Location: ../loginpage.html");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        echo "All fields are required.";
    }

    $conn->close();
}
?>
