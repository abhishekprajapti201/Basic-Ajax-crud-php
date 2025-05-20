<?php
include ('../crud/config.php');

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);
$index =
$output = '';
while ($row = $result->fetch_assoc()) {
    $output .= "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>
            <button class='edit' data-id='{$row['id']}' data-name='{$row['name']}' data-email='{$row['email']}'>Edit</button>
            <button class='delete' data-id='{$row['id']}'>Delete</button>
        </td>
    </tr>";
}
echo $output;
