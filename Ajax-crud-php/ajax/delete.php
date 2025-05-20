<?php
include ('../crud/config.php');

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id=$id";
if ($conn->query($sql)) {
    echo "Deleted successfully.";
} else {
    echo "Error: " . $conn->error;
}
