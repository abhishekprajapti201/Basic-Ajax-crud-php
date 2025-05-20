<?php
include ('../crud/config.php');
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
if ($conn->query($sql)) {
    echo "Updated successfully.";
} else {
    echo "Error: " . $conn->error;
}
