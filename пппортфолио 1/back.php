<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aurore_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $reservation_date = $_POST['reservation_date'];
    $guests = $_POST['guests'];

    $sql = "INSERT INTO reservations (name, email, phone, reservation_date, guests) 
            VALUES ('$name', '$email', '$phone', '$reservation_date', '$guests')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>