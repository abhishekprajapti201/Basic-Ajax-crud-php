<?php
include('../crud/config.php');

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
if ($conn->query($sql)) {
    echo "Inserted successfully.";
} else {
    echo "Error: " . $conn->error;
}
